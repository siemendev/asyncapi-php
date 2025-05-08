<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * AMQP Server Binding Object
 * 
 * This object MUST NOT contain any properties. Its name is reserved for future use.
 * 
 * @see https://github.com/asyncapi/bindings/blob/master/amqp/README.md#server-binding-object
 */
class AmqpServerBinding extends AsyncApiObject
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