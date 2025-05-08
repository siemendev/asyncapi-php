<?php

use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBinding;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpChannelBindingExchange;
use Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings\AmqpOperationBinding;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Info;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;
use Siemendev\AsyncapiPhp\Spec\Model\Schema;
use Siemendev\AsyncapiPhp\Spec\Model\SecurityScheme;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

return new AsyncApi(
    new Info('Demo API', '1.0.0')
        ->setDescription('This is a demo AsyncAPI specification')
)
    ->addServer(
        'rabbitmq',
        new Server('localhost:15672', 'amqp')
            ->addSecurity(new SecurityScheme('basicAuth'))
    )
    ->addChannel(
        'test',
        new Channel()
            ->setTitle('Test Channel')
            ->addServer(new Reference('#/servers/rabbitmq'))
            ->addMessage(
                'test',
                new Message()
                    ->setName('test')
                    ->setTitle('Test Message')
                    ->setDescription('This is a test message')
                    ->setContentType('application/json')
                    ->setPayload(
                        new Schema()
                            ->setType('object')
                            ->setRequired(['name'])
                            ->addProperty(
                                'name',
                                new Schema()->setType('string'),
                            )
                            ->addProperty(
                                'age',
                                new Schema()->setType('integer'),
                            )
                    )
            )
            ->addBinding(
                'amqp',
                new AmqpChannelBinding()
                    ->setIs(AmqpChannelBinding::TYPE_ROUTING_KEY)
                    ->setExchange(
                        new AmqpChannelBindingExchange()
                            ->setName('test_exchange')
                            ->setType('classic')
                    )
            )
    )
    ->addOperation(
        'publish',
        new Operation()
            ->setSummary('Publish a test message')
            ->setDescription('This operation publishes a test message to the test channel')
            ->setChannel(new Reference('#/channels/test'))
            ->addMessage(new Reference('#/channels/test/messages/test'))
            ->addBinding(
                'amqp',
                new AmqpOperationBinding()->setCc(['test'])
            )
    )
;
