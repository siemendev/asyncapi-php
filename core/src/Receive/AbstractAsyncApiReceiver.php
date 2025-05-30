<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\MessageHandler\MessageHandlerResolver;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;
use Siemendev\AsyncapiPhp\Spec\SpecRepository;

abstract class AbstractAsyncApiReceiver implements AsyncApiReceiverInterface
{
    protected AdapterResolver $adapterResolver;

    protected MessageHandlerResolver $messageHandlerResolver;

    protected SerializationHandler $serializer;

    protected SpecRepository $specRepo;

    protected MessageMapper $messageMapper;

    public function __construct(
        ?AdapterResolver $adapterResolver = null,
        ?MessageHandlerResolver $messageHandlerResolver = null,
        ?SerializationHandler $serializer = null,
        ?SpecRepository $specRepo = null,
        ?MessageMapper $messageMapper = null,
    ) {
        $this->adapterResolver = $adapterResolver ?? new AdapterResolver();
        $this->messageHandlerResolver = $messageHandlerResolver ?? new MessageHandlerResolver();
        $this->serializer = $serializer ?? new SerializationHandler();
        $this->specRepo = $specRepo ?? new SpecRepository();
        $this->messageMapper = $messageMapper ?? new MessageMapper($this->specRepo, $this->serializer);
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

    public function setSpecRepository(SpecRepository $specRepo): self
    {
        $this->specRepo = $specRepo;

        return $this;
    }
}
