<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPExceptionInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBinding;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpOperationBinding;
use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;

class AmqpPublisher
{
    /**
     * @param array<string, string> $headers
     * @throws InvalidSpecificationException
     * @throws InvalidAdapterConfigurationException
     * @throws MessagePublishFailedException
     */
    public function publishMessage(
        AMQPStreamConnection $connection,
        Channel $channel,
        Operation $operation,
        Message $message,
        string $content,
        string $contentType,
        array $headers = [],
    ): void {
        $operationBinding = $operation->resolveBindings()->getAmqp();
        if (!$operationBinding instanceof AmqpOperationBinding) {
            throw new InvalidSpecificationException('Operation binding is not of type AmqpOperationBinding'); # todo change this to be more helpful
        }

        $channelBinding = $channel->resolveBindings()->getAmqp();
        if (!$channelBinding instanceof AmqpChannelBinding) {
            throw new InvalidSpecificationException('Channel binding is not of type AmqpChannelBinding'); # todo change this to be more helpful
        }

        if ($channelBinding->getIs() !== AmqpChannelBinding::TYPE_ROUTING_KEY) {
            throw new InvalidAdapterConfigurationException('Channel binding is not of type routing key'); # todo change this to be more helpful
        }

        $messageHeaders = [
            'message_name' => $message->getName(),
            'expiration' => $operationBinding->getExpiration(),
            'priority' => $operationBinding->getPriority(),
            'user_id' => $operationBinding->getUserId(),
            'content_type' => $contentType,
            'delivery_mode' => $operationBinding->getDeliveryMode(),
        ] + $headers;

        if ($operationBinding->getTimestamp()) {
            $messageHeaders['timestamp'] = time(); // Default to current time if not set
        }

        $amqpMessage = new AMQPMessage($content, $messageHeaders);

        $sent = false;
        try {
            foreach ($operationBinding->getCc() ?? [] as $routingKey) {
                $connection->channel()->basic_publish(
                    $amqpMessage,
                    $channelBinding->getExchange()?->getName(),
                    $routingKey,
                    $operationBinding->getMandatory() ?? false,
                );
                $sent = true;
            }
            foreach ($operationBinding->getBcc() ?? [] as $routingKey) {
                $connection->channel()->basic_publish(
                    $amqpMessage,
                    $channelBinding->getExchange()?->getName(),
                    $routingKey,
                    $operationBinding->getMandatory() ?? false,
                );
                $sent = true;
            }
        } catch (AMQPExceptionInterface $e) {
            throw new MessagePublishFailedException($e->getMessage(), previous: $e);
        }

        if (!$sent) {
            throw new MessagePublishFailedException('No routing keys provided for message publishing.'); # todo change this to be more helpful
        }
    }
}
