<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Siemendev\AsyncapiPhp\Adapter\AbstractAdapter;
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

    public function __construct(
        ?AmqpConnectionBuilder $connectionFactory = null,
        ?AmqpPublisher $publisher = null,
    ) {
        $this->connectionFactory = $connectionFactory ?? new AmqpConnectionBuilder();
        $this->publisher = $publisher ?? new AmqpPublisher();
    }

    public function supports(Server $serverSpec, CredentialsInterface $credentials): bool
    {
        return strtolower($serverSpec->getProtocol()) === 'amqp';
    }

    /**
     * @param array<string, string> $headers
     * @throws InvalidSpecificationException
     */
    public function publishMessage(
        Operation $operation,
        Message $message,
        string $content,
        string $contentType,
        array $headers = [],
    ): void {
        $channel = $operation->resolveChannel();
        if (!$channel instanceof Channel) {
            throw new InvalidSpecificationException('Channel not found'); // todo change this to be more helpful
        }
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
     * @param callable(string $messageData): void $callback
     */
    public function consume(Operation $operation, callable $callback): void
    {
        // TODO: Implement consume() method.
    }

    private function getConnection(Channel $channel): AMQPStreamConnection
    {
        return $this->connectionFactory->getConnection(
            $this->getCredentials(),
            $this->getServerSpec(),
            $channel,
        );
    }
}
