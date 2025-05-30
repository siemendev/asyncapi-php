<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBinding;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpOperationBinding;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;

class AmqpProvisioner
{
    /**
     * @throws InvalidSpecificationException
     */
    public function provisionOperation(
        AMQPStreamConnection $connection,
        Operation $operation,
    ): void {
        $operationBinding = $operation->resolveBindings()->getAmqp();
        if (!$operationBinding instanceof AmqpOperationBinding) {
            throw new InvalidSpecificationException('Operation binding is not of type AmqpOperationBinding');
        }
        $channel = $operation->resolveChannel();
        $channelBinding = $channel->resolveBindings()->getAmqp();
        if (!$channelBinding instanceof AmqpChannelBinding) {
            throw new InvalidSpecificationException('Channel binding is not of type AmqpChannelBinding');
        }
        if ($channelBinding->getIs() === AmqpChannelBinding::TYPE_ROUTING_KEY) {
            $connection->channel()->exchange_declare(
                $channelBinding->getExchange()?->getName() ?? '',
                $channelBinding->getExchange()?->getType() ?? 'topic',
                false,
                $channelBinding->getExchange()?->getDurable() ?? false,
                $channelBinding->getExchange()?->getAutoDelete() ?? false,
            );

            return;
        }
        if ($channelBinding->getIs() === AmqpChannelBinding::TYPE_QUEUE) {
            $connection->channel()->queue_declare(
                $channelBinding->getQueue()?->getName() ?? '',
                false,
                $channelBinding->getQueue()?->getDurable() ?? false,
                $channelBinding->getQueue()?->getExclusive() ?? false,
                $channelBinding->getQueue()?->getAutoDelete() ?? false,
            );
            if ($channel->hasExtension('x-bind-to-exchange')) {
                $exchange = $channel->getExtension('x-bind-to-exchange');
                $routingKey = $channel->getExtension('x-bind-to-routing-key');
                if (is_scalar($exchange)) {
                    $connection->channel()->queue_bind(
                        $channelBinding->getQueue()?->getName() ?? '',
                        (string) $exchange,
                        is_scalar($routingKey) ? (string) $routingKey : '',
                    );
                }
            }

            return;
        }
    }
}
