<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Siemendev\AsyncapiPhp\Adapter\AbstractAdapter;
use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

class AmqpAdapter extends AbstractAdapter
{
    private AmqpConnectionBuilder $connectionFactory;

    private AmqpPublisher $publisher;

    private AmqpConsumer $consumer;

    private AmqpProvisioner $provisioner;

    public function __construct(
        ?AmqpConnectionBuilder $connectionFactory = null,
        ?AmqpPublisher $publisher = null,
        ?AmqpConsumer $consumer = null,
        ?AmqpProvisioner $provisioner = null,
    ) {
        $this->connectionFactory = $connectionFactory ?? new AmqpConnectionBuilder();
        $this->publisher = $publisher ?? new AmqpPublisher();
        $this->consumer = $consumer ?? new AmqpConsumer();
        $this->provisioner = $provisioner ?? new AmqpProvisioner();
    }

    public function supports(Server $serverSpec, CredentialsInterface $credentials): bool
    {
        return strtolower($serverSpec->getProtocol()) === 'amqp';
    }

    /**
     * @param array<string, string> $headers
     * @throws InvalidSpecificationException
     * @throws InvalidAdapterConfigurationException
     * @throws MessagePublishFailedException
     */
    public function publish(
        Operation $operation,
        Message $message,
        string $content,
        string $contentType,
        array $headers = [],
    ): void {
        $channel = $operation->resolveChannel();
        $this->publisher->publishMessage(
            $this->getConnection($channel),
            $channel,
            $operation,
            $message,
            $content,
            $contentType,
            $headers,
        );
    }

    /**
     * @param callable(string $payload, array<string, scalar|null> $headers): void $callback
     * @throws InvalidSpecificationException
     */
    public function consume(Operation $operation, callable $callback): void
    {
        $this->consumer->consume(
            $this->getConnection($operation->resolveChannel()),
            $operation,
            $callback,
        );
    }

    private function getConnection(Channel $channel): AMQPStreamConnection
    {
        return $this->connectionFactory->getConnection(
            $this->getCredentials(),
            $this->getServerSpec(),
            $channel,
        );
    }

    public function provisionOperation(Operation $operation): void
    {
        $this->provisioner->provisionOperation(
            $this->getConnection($operation->resolveChannel()),
            $operation,
        );
    }
}
