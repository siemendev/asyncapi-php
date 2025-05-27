<?php

namespace Siemendev\AsyncapiPhp\Provision;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;

abstract class AbstractAsyncApiProvisioner implements AsyncApiProvisionerInterface
{
    protected AdapterResolver $adapterResolver;

    public function __construct(
        ?AdapterResolver $adapterResolver = null,
    ) {
        $this->adapterResolver = $adapterResolver ?? new AdapterResolver();
    }

    public function setAdapterResolver(AdapterResolver $adapterResolver): self
    {
        $this->adapterResolver = $adapterResolver;

        return $this;
    }
}
