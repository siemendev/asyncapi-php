<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Publish;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;

abstract class AbstractAsyncApiPublisher implements AsyncApiPublisherInterface
{
    protected AdapterResolver $adapterResolver;

    protected SerializationHandler $serializer;

    public function __construct(
        ?AdapterResolver $adapterResolver = null,
        ?SerializationHandler $serializer = null,
    ) {
        $this->adapterResolver = $adapterResolver ?? new AdapterResolver();
        $this->serializer = $serializer ?? new SerializationHandler();
    }

    /**
     * @return $this
     */
    public function setAdapterResolver(AdapterResolver $adapterManager): self
    {
        $this->adapterResolver = $adapterManager;

        return $this;
    }

    /**
     * @return $this
     */
    public function setSerializationHandler(SerializationHandler $serializer): self
    {
        $this->serializer = $serializer;

        return $this;
    }
}
