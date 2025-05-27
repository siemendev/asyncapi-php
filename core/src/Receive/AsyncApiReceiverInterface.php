<?php

namespace Siemendev\AsyncapiPhp\Receive;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\MessageHandler\MessageHandlerResolver;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;

interface AsyncApiReceiverInterface
{
    public function receiveMessages(Configuration $configuration, string $operationName, ?string $serverName = null): void;

    public function setAdapterResolver(AdapterResolver $adapterResolver): self;

    public function setMessageHandlerResolver(MessageHandlerResolver $messageHandlerResolver): self;

    public function setSerializationHandler(SerializationHandler $serializer): self;
}
