<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * Abstract base class for all operation binding objects.
 *
 * Operation bindings contain protocol-specific definitions for an operation.
 */
abstract class OperationBinding extends AsyncApiObject
{
    /** The version of this binding. If omitted, "latest" MUST be assumed. */
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
