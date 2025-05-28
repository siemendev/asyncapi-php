<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Publish;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;
use Siemendev\AsyncapiPhp\Spec\SpecRepository;

abstract class AbstractAsyncApiPublisher implements AsyncApiPublisherInterface
{
    protected AdapterResolver $adapterResolver;

    protected SpecRepository $specRepo;

    protected SerializationHandler $serializer;

    public function __construct(
        ?AdapterResolver $adapterResolver = null,
        ?SpecRepository $specRepo = null,
        ?SerializationHandler $serializer = null,
    ) {
        $this->adapterResolver = $adapterResolver ?? new AdapterResolver();
        $this->specRepo = $specRepo ?? new SpecRepository();
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
