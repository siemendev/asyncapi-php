<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * An object that specifies where an operation has to send the reply.
 */
class OperationReplyAddress extends AsyncApiObject
{
    /**
     * An optional string representation of this reply address.
     * The address is typically the "topic name", "routing key", "event type", or "path".
     * When null or absent, it MUST be interpreted as unknown.
     * This is useful when the address is generated dynamically at runtime or can't be known upfront.
     */
    protected ?string $location = null;

    /**
     * An optional description of this reply address.
     * CommonMark syntax can be used for rich text representation.
     */
    protected ?string $description = null;

    /**
     * Get the location.
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * Set the location.
     */
    public function setLocation(?string $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Get the description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the description.
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
