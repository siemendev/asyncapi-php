<?php

namespace Siemendev\AsyncapiPhp;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Generator\Generator;
use Siemendev\AsyncapiPhp\MessageHandler\MessageHandlerResolver;
use Siemendev\AsyncapiPhp\Publish\AsyncApiPublisher;
use Siemendev\AsyncapiPhp\Publish\AsyncApiPublisherInterface;
use Siemendev\AsyncapiPhp\Receive\AsyncApiReceiver;
use Siemendev\AsyncapiPhp\Receive\AsyncApiReceiverInterface;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;

abstract class AbstractAsyncApiManager implements AsyncApiManagerInterface
{
    protected AsyncApiPublisherInterface $publisher;
    protected AsyncApiReceiverInterface $receiver;
    protected AdapterResolver $adapterResolver;
    protected MessageHandlerResolver $messageHandlerResolver;
    protected SerializationHandler $serializer;
    protected Generator $generator;

    public function __construct(
        protected Configuration $configuration,
        ?AsyncApiPublisherInterface $publisher = null,
        ?AsyncApiReceiverInterface $receiver = null,
        ?AdapterResolver $adapterManager = null,
        ?MessageHandlerResolver $messageHandlerResolver = null,
        ?SerializationHandler $serializer = null,
        ?Generator $generator = null,
    ) {
        $this->adapterResolver = $adapterManager ?? new AdapterResolver();
        $this->serializer = $serializer ?? new SerializationHandler();
        $this->messageHandlerResolver = $messageHandlerResolver ?? new MessageHandlerResolver();
        $this->publisher = $publisher ?? new AsyncApiPublisher();
        $this->publisher
            ->setAdapterResolver($this->adapterResolver)
            ->setSerializationHandler($this->serializer)
        ;
        $this->receiver = $receiver ?? new AsyncApiReceiver();
        $this->receiver
            ->setAdapterResolver($this->adapterResolver)
            ->setMessageHandlerResolver($this->messageHandlerResolver)
            ->setSerializationHandler($this->serializer)
        ;
        if ($generator) {
            $this->generator = $generator;
        }
    }

    /**
     * @return $this
     */
    public function setConfiguration(Configuration $configuration): self
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * @return $this
     */
    public function setSerializationHandler(SerializationHandler $serializer): self
    {
        $this->serializer = $serializer;
        $this->publisher->setSerializationHandler($serializer);
        $this->receiver->setSerializationHandler($serializer);

        return $this;
    }

    /**
     * @return $this
     */
    public function setGenerator(Generator $generator): self
    {
        $this->generator = $generator;

        return $this;
    }

    /**
     * @return $this
     */
    public function setPublisher(AsyncApiPublisher $publisher): self
    {
        $this->publisher = $publisher
            ->setSerializationHandler($this->serializer)
            ->setAdapterResolver($this->adapterResolver)
        ;

        return $this;
    }

    /**
     * @return $this
     */
    public function setReceiver(AsyncApiReceiver $receiver): self
    {
        $this->receiver = $receiver
            ->setAdapterResolver($this->adapterResolver)
            ->setMessageHandlerResolver($this->messageHandlerResolver)
        ;

        return $this;
    }

    /**
     * @return $this
     */
    public function setAdapterResolver(AdapterResolver $adapterResolver): self
    {
        $this->adapterResolver = $adapterResolver;
        $this->publisher->setAdapterResolver($adapterResolver);
        $this->receiver->setAdapterResolver($adapterResolver);

        return $this;
    }

    /**
     * @return $this
     */
    public function setMessageHandlerResolver(MessageHandlerResolver $messageHandlerResolver): self
    {
        $this->messageHandlerResolver = $messageHandlerResolver;
        $this->receiver->setMessageHandlerResolver($messageHandlerResolver);

        return $this;
    }
}