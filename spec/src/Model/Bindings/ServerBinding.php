<?php

namespace Siemendev\AsyncapiPhp\Spec\Model\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * Abstract base class for all server binding objects.
 * 
 * Server bindings contain protocol-specific definitions for a server.
 */
abstract class ServerBinding extends AsyncApiObject
{
    /**
     * The version of this binding. If omitted, "latest" MUST be assumed.
     */
    protected ?string $bindingVersion = null;

    /**
     * Get the binding version.
     */
    public function getBindingVersion(): ?string
    {
        return $this->bindingVersion;
    }

    /**
     * Set the binding version.
     */
    public function setBindingVersion(?string $bindingVersion): self
    {
        $this->bindingVersion = $bindingVersion;
        return $this;
    }
}
