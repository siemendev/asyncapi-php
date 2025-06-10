<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Siemendev\AsyncapiPhp\Adapter\Amqp\AmqpAdapter;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBinding;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBindingExchange;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBindingQueue;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpOperationBinding;
use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Credentials\UsernamePasswordCredentials;
use Siemendev\AsyncapiPhp\Configuration\StubConfiguration;
use Siemendev\AsyncapiPhp\Generator\Generator;
use Siemendev\AsyncapiPhp\Serializer\Symfony\JsonSerializer;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\Bindings\ChannelBindings;
use Siemendev\AsyncapiPhp\Spec\Model\Bindings\OperationBindings;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Components;
use Siemendev\AsyncapiPhp\Spec\Model\Info;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\References\ChannelMessageReference;
use Siemendev\AsyncapiPhp\Spec\Model\References\ChannelReference;
use Siemendev\AsyncapiPhp\Spec\Model\References\ComponentMessageReference;
use Siemendev\AsyncapiPhp\Spec\Model\References\ServerReference;
use Siemendev\AsyncapiPhp\Spec\Model\Schema;
use Siemendev\AsyncapiPhp\Spec\Model\SecurityScheme;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

$host = (getenv('ASYNCAPI_RABBITMQ_HOST') ?: 'localhost') . ':' . (getenv('ASYNCAPI_RABBITMQ_PORT') ?: '5672');

global $spec;

$spec = (new AsyncApi(
    (new Info('Demo API', '1.0.0'))
        ->setDescription('This is a demo AsyncAPI specification')
))
    ->addServer(
        'rabbitmq',
        (new Server($host, 'amqp'))
            ->addSecurity(new SecurityScheme('basicAuth'))
    )
    ->addChannel(
        'test_publish',
        (new Channel())
            ->setTitle('Test Publish Channel')
            ->addServer(new ServerReference('rabbitmq'))
            ->addMessage(
                'test',
                new ComponentMessageReference('test')
            )
            ->setBindings(
                (new ChannelBindings())
                    ->setAmqp(
                        (new AmqpChannelBinding())
                            ->setIs(AmqpChannelBinding::TYPE_ROUTING_KEY)
                            ->setExchange(
                                (new AmqpChannelBindingExchange())
                                    ->setName('test_exchange')
                                    ->setType('direct')
                            )
                    )
            )
    )
    ->addChannel(
        'test_receive',
        (new Channel())
            ->setTitle('Test Channel')
            ->addServer(new ServerReference('rabbitmq'))
            ->addMessage(
                'test',
                new ComponentMessageReference('test')
            )
            ->addExtension('x-bind-to-exchange', 'test_exchange')
            ->addExtension('x-bind-to-routing-key', 'test')
            ->setBindings(
                (new ChannelBindings())
                    ->setAmqp(
                        (new AmqpChannelBinding())
                            ->setIs(AmqpChannelBinding::TYPE_QUEUE)
                            ->setQueue(
                                (new AmqpChannelBindingQueue())
                                    ->setName('test_queue')
                                    ->setDurable(true)
                            )
                    )
            )
    )
    ->addOperation(
        'test_publish',
        (new Operation())
            ->setSummary('Publish a test message')
            ->setDescription('This operation publishes a test message to a test channel')
            ->setChannel(new ChannelReference('test_publish'))
            ->addMessage(new ChannelMessageReference('test_publish', 'test'))
            ->setBindings(
                (new OperationBindings())
                    ->setAmqp(
                        (new AmqpOperationBinding())->setCc(['test'])
                    )
            )
    )
    ->addOperation(
        'test_receive',
        (new Operation())
            ->setSummary('Receive a test message')
            ->setDescription('This operation receives messages from a test channel')
            ->setChannel(new ChannelReference('test_receive'))
            ->addMessage(new ChannelMessageReference('test_receive', 'test'))
            ->setBindings(
                (new OperationBindings())
                    ->setAmqp(
                        (new AmqpOperationBinding())->setAck(true)
                    )
            )
    )
    ->setComponents(
        (new Components())
            ->addMessage(
                'test',
                (new Message())
                    ->setName('test')
                    ->setTitle('Test Message')
                    ->setDescription('This is a test message')
                    ->setContentType('application/json')
                    ->setPayload(
                        (new Schema())
                            ->setType('object')
                            ->setRequired(['name'])
                            ->addProperty(
                                'name',
                                (new Schema())->setType('string'),
                            )
                            ->addProperty(
                                'age',
                                (new Schema())->setType('integer'),
                            )
                    )
            )
    )
;

$config = new Configuration(
    $spec,
    (new StubConfiguration())
        ->setPath(__DIR__)
        ->setNamespace('Siemendev\AsyncapiPhp\Adapter\Amqp\Tests'),
    [
        'rabbitmq' => new UsernamePasswordCredentials(getenv('ASYNCAPI_RABBITMQ_USER') ?: 'guest', getenv('ASYNCAPI_RABBITMQ_PASS') ?: 'guest'),
    ],
);

global $manager;

$manager = (new AsyncApiManager($config))
    ->setGenerator(new Generator())
    ->addAdapter(new AmqpAdapter())
    ->addSerializer(new JsonSerializer())
;
