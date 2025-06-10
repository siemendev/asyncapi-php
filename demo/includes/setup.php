<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Siemendev\AsyncapiPhp\Adapter\Amqp\AmqpAdapter;
use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Credentials\UsernamePasswordCredentials;
use Siemendev\AsyncapiPhp\Configuration\StubConfiguration;
use Siemendev\AsyncapiPhp\Generator\Generator;
use Siemendev\AsyncapiPhp\Serializer\Symfony\JsonSerializer;

$config = new Configuration(
    include __DIR__ . '/spec.php',
    (new StubConfiguration())
        ->setPath(__DIR__ . '/../stub')
        ->setNamespace('Siemendev\AsyncapiPhp\Demo\Stub'),
    [
        'rabbitmq' => new UsernamePasswordCredentials(getenv('ASYNCAPI_RABBITMQ_USER'), getenv('ASYNCAPI_RABBITMQ_PASS')),
    ],
);

return (new AsyncApiManager($config))
    ->setGenerator(new Generator())
    ->addAdapter(new AmqpAdapter())
    ->addSerializer(new JsonSerializer())
;
