<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Adds metadata to a single tag that is used by the Operation Object.
 */
class Tag extends AsyncApiObject
{
    /** The name of the tag. */
    protected string $name;

    /** A short description for the tag. */
    protected ?string $description = null;

    /** Additional external documentation for this tag. */
    protected ?ExternalDocumentation $externalDocs = null;

    /**
     * Constructor.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the name.
     */
    public function getName(): string
    {
        return $this->name;
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

    /**
     * Get the external documentation.
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->externalDocs;
    }

    /**
     * Set the external documentation.
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs): self
    {
        $this->externalDocs = $externalDocs->setParentElement($this);

        return $this;
    }
}
