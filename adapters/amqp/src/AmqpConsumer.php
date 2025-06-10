<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use ErrorException;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBinding;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpOperationBinding;
use Siemendev\AsyncapiPhp\Adapter\Exception\AdapterConsumptionException;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception\MessageHandlerErrorException;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception\MessageHandlerFailedException;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Fiber;

class AmqpConsumer
{
    /** @var AMQPChannel[] */
    private static array $openChannels = [];

    /** Flag to control consumption */
    private static bool $shouldContinueConsuming = true;

    /**
     * @param callable(string $payload, array<string, scalar|null> $headers): void $callback
     * @throws InvalidSpecificationException
     * @throws AdapterConsumptionException
     */
    public function consume(AMQPStreamConnection $connection, Operation $operation, callable $callback): void
    {
        $operationBinding = $operation->resolveBindings()->getAmqp();
        if (!$operationBinding instanceof AmqpOperationBinding) {
            throw new InvalidSpecificationException('Operation binding is not of type ' . AmqpOperationBinding::class);
        }

        $channel = $operation->resolveChannel();
        $channelBinding = $channel->resolveBindings()->getAmqp();
        if (!$channelBinding instanceof AmqpChannelBinding) {
            throw new InvalidSpecificationException('Channel binding is not of type ' . AmqpChannelBinding::class);
        }

        $queueName = $channelBinding->getQueue()?->getName() ?? '';
        if (!$queueName) {
            throw new InvalidSpecificationException('Queue name is not defined in channel binding');
        }

        $amqpChannel = $connection->channel();
        self::$openChannels[] = $amqpChannel;
        $amqpChannel->basic_consume(
            $queueName,
            '',
            false,
            $operationBinding->getAck() ?? false,
            false,
            false,
            fn(AMQPMessage $message) => $this->handleMessage($operationBinding, $message, $callback),
        );

        try {
            // Reset the consumption flag
            self::$shouldContinueConsuming = true;

            // Use non-blocking wait with timeout instead of blocking consume @phpstan-ignore booleanAnd.leftAlwaysTrue
            while (self::$shouldContinueConsuming && count($amqpChannel->callbacks)) {
                // Process messages for a short time (0.1 seconds) then return control
                $amqpChannel->wait(null, false, 0.1);

                // Allow the fiber to suspend and resume if needed
                if (Fiber::getCurrent() && Fiber::getCurrent()->isSuspended() === false) {
                    Fiber::suspend();
                }
            }
        } catch (ErrorException $e) {
            throw new AdapterConsumptionException($e->getMessage(), $e->getCode(), $e);
        } finally {
            unset(self::$openChannels[array_search($amqpChannel, self::$openChannels, true)]);
        }
    }

    public static function stopAllConsumers(): void
    {
        // Set the flag to stop the consumption loop
        self::$shouldContinueConsuming = false;

        // Also call stopConsume on all channels to ensure they stop immediately
        foreach (self::$openChannels as $channel) {
            $channel->stopConsume();
        }
    }

    /**
     * @param callable(string $payload, array<string, scalar|null> $headers): void $callback
     * @throws MessageHandlerFailedException
     * @throws MessageHandlerErrorException
     */
    private function handleMessage(
        AmqpOperationBinding $operationBinding,
        AMQPMessage $message,
        callable $callback,
    ): void {
        $callback($message->getBody(), $message->get_properties()); // @phpstan-ignore-line

        // ack when auto ack is disabled
        if (!($operationBinding->getAck() ?? false)) {
            $message->ack();
        }
    }
}
