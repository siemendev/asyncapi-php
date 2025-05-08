<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp;

use PhpAmqpLib\Connection\AMQPConnectionConfig;
use PhpAmqpLib\Connection\AMQPConnectionFactory;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Configuration\Credentials\UsernamePasswordCredentials;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

class AmqpConnectionBuilder
{
    private AMQPStreamConnection $connection;

    public function getConnection(CredentialsInterface $credentials, Server $server): AMQPStreamConnection
    {
        if (isset($this->connection) && $this->connection->isConnected()) {
            return $this->connection;
        }

        if (!$credentials instanceof UsernamePasswordCredentials) {
            throw new \LogicException('AMQP adapter only supports username/password credentials');
        }

        [$host, $port] = explode(':', $server->getHost());
        $config = new AMQPConnectionConfig();
        $config->setIoType(AMQPConnectionConfig::IO_TYPE_STREAM);
        $config->setHost($host ?: 'changeme');
        $config->setPort($port ?: 5672);
        if ($credentials->getUsername()) {
            $config->setUser($credentials->getUsername());
        }
        if ($credentials->getPassword()) {
            $config->setPassword($credentials->getPassword());
        }
        $config->setVhost($server->getPathname() ?? '/');

        // todo allow overwriting dsn parts with config properties for each part

        /** @var AMQPStreamConnection $connection */
        $connection = AMQPConnectionFactory::create($config);

        return $this->connection = $connection;
    }
}