<?php
include __DIR__ . '/../vendor/autoload.php';

use Siemendev\AsyncapiPhp\Adapter\Amqp\AmqpAdapter;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Credentials\UsernamePasswordCredentials;
use Siemendev\AsyncapiPhp\Configuration\StubConfiguration;
use Siemendev\AsyncapiPhp\Demo\TestMessageHandler;
use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Serializer\Symfony\JsonSerializer;

$config = new Configuration(
    include __DIR__ . '/spec.php',
    new StubConfiguration()
        ->setPath(__DIR__ . '/../stub')
        ->setNamespace('Siemendev\AsyncapiPhp\Demo\Stub'),
    [
        'rabbitmq' => new UsernamePasswordCredentials('guest', 'guest'),
    ],
);

return new AsyncApiManager($config)
    ->setGenerator(new \Siemendev\AsyncapiPhp\Generator\Generator())
    ->addAdapter(new AmqpAdapter())
    ->addMessageHandler(new TestMessageHandler())
    ->addSerializer(new JsonSerializer())
;
