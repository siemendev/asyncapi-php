<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use LogicException;
use PhpAmqpLib\Connection\AMQPConnectionConfig;
use PhpAmqpLib\Connection\AMQPConnectionFactory;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBinding;
use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Configuration\Credentials\UsernamePasswordCredentials;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

class AmqpConnectionBuilder
{
    private AMQPStreamConnection $connection;

    public function getConnection(
        CredentialsInterface $credentials,
        Server $server,
        Channel $channel,
    ): AMQPStreamConnection {
        if (isset($this->connection) && $this->connection->isConnected()) {
            return $this->connection;
        }
        if (!$credentials instanceof UsernamePasswordCredentials) {
            throw new LogicException('AMQP adapter only supports username/password credentials'); // todo make exception more helpful
        }

        [$host, $port] = explode(':', $server->getHost());
        $config = new AMQPConnectionConfig();
        $config->setIoType(AMQPConnectionConfig::IO_TYPE_STREAM);
        $config->setHost($host ?: 'changeme');
        $config->setPort(is_numeric($port) && $port > 0 ? (int) $port : 5672);
        if ($credentials->getUsername()) {
            $config->setUser($credentials->getUsername());
        }
        if ($credentials->getPassword()) {
            $config->setPassword($credentials->getPassword());
        }

        $vhost = null;
        $channelBinding = $channel->resolveBindings()->getAmqp();
        if ($channelBinding instanceof AmqpChannelBinding) {
            if ($channelBinding->getIs() === AmqpChannelBinding::TYPE_ROUTING_KEY) {
                $vhost = $channelBinding->getExchange()?->getVhost();
            }
            if ($channelBinding->getIs() === AmqpChannelBinding::TYPE_QUEUE) {
                $vhost = $channelBinding->getQueue()?->getVhost();
            }
        }
        if ($server->getPathname()) {
            $vhost = $server->getPathname();
        }
        $vhost = ltrim((string) $vhost, '/');

        $config->setVhost(empty($vhost) ? '/' : $vhost);

        // todo allow overwriting dsn parts with config properties for each part

        /** @var AMQPStreamConnection $connection */
        $connection = AMQPConnectionFactory::create($config);

        return $this->connection = $connection;
    }
}
