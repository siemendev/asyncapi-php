<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\MessageHandler\MessageHandlerResolver;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;

abstract class AbstractAsyncApiReceiver implements AsyncApiReceiverInterface
{
    protected AdapterResolver $adapterResolver;

    protected MessageHandlerResolver $messageHandlerResolver;

    protected SerializationHandler $serializer;

    protected MessageMapper $messageMapper;

    public function __construct(
        ?AdapterResolver $adapterResolver = null,
        ?MessageHandlerResolver $messageHandlerResolver = null,
        ?SerializationHandler $serializer = null,
        ?MessageMapper $messageMapper = null,
    ) {
        $this->adapterResolver = $adapterResolver ?? new AdapterResolver();
        $this->messageHandlerResolver = $messageHandlerResolver ?? new MessageHandlerResolver();
        $this->serializer = $serializer ?? new SerializationHandler();
        $this->messageMapper = $messageMapper ?? new MessageMapper($this->serializer);
    }

    public function setAdapterResolver(AdapterResolver $adapterResolver): self
    {
        $this->adapterResolver = $adapterResolver;

        return $this;
    }

    public function setMessageHandlerResolver(MessageHandlerResolver $messageHandlerResolver): self
    {
        $this->messageHandlerResolver = $messageHandlerResolver;

        return $this;
    }

    public function setSerializationHandler(SerializationHandler $serializer): self
    {
        $this->serializer = $serializer;
        $this->messageMapper->setSerializationHandler($serializer);

        return $this;
    }
}
