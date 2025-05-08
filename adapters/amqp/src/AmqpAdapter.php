<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Siemendev\AsyncapiPhp\Adapter\AbstractAdapter;
use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\Server;
use Siemendev\AsyncapiPhp\Spec\ReferenceResolver;

class AmqpAdapter extends AbstractAdapter
{
    public function __construct(
        private ?AmqpConnectionBuilder $connectionFactory = null,
        private ?AmqpPublisher         $publisher = null,
    ) {
        $this->connectionFactory ??= new AmqpConnectionBuilder();
        $this->publisher ??= new AmqpPublisher();
    }

    public function supports(Server $serverSpec, CredentialsInterface $credentials): bool
    {
        return strtolower($serverSpec->getProtocol()) === 'amqp';
    }

    public function publishMessage(Operation $operation, Message $message, string $content, string $contentType, array $headers = []): void
    {
        $this->publisher->publishMessage(
            $this->getConnection(),
            ReferenceResolver::dereference($this->getRootSpec(), $operation->getChannel(), Channel::class),
            $operation,
            $message,
            $content,
            $contentType,
            $headers
        );
    }

    /**
     * @param callable(string $messageData): void $callback
     */
    public function consume(Operation $operation, callable $callback): void
    {
        // TODO: Implement consume() method.
    }

    private function getConnection(): AMQPStreamConnection
    {
        return $this->connectionFactory->getConnection($this->getCredentials(), $this->getServerSpec());
    }
}
