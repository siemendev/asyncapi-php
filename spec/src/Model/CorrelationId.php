<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * An object that specifies an identifier at design time that can be used to correlate one message with another.
 */
class CorrelationId extends AsyncApiObject
{
    /**
     * A runtime expression that specifies the location of the correlation ID.
     */
    protected string $location;

    /**
     * A short description of the correlation ID.
     */
    protected ?string $description = null;

    /**
     * Constructor.
     *
     * @param string $location A runtime expression that specifies the location of the correlation ID
     */
    public function __construct(string $location)
    {
        $this->location = $location;
    }

    /**
     * Get the location.
     */
    public function getLocation(): string
    {
        return $this->location;
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
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
