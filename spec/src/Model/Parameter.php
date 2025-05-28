<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes a parameter included in a channel address.
 */
class Parameter extends AsyncApiObject
{
    /** A brief description of the parameter. */
    protected ?string $description = null;

    /** The location of the parameter. */
    protected ?string $location = null;

    /**
     * The schema defining the type used for the parameter.
     *
     * @var Schema|Reference<Schema>|null
     */
    protected Schema|Reference|null $schema = null;

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
     * Get the location.
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * Set the location.
     */
    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the schema.
     *
     * @return Schema|Reference<Schema>|null
     */
    public function getSchema(): Schema|Reference|null
    {
        return $this->schema;
    }

    /**
     * Set the schema.
     *
     * @param Schema|Reference<Schema> $schema
     */
    public function setSchema(Schema|Reference $schema): self
    {
        $this->schema = $schema->setParentElement($this);

        return $this;
    }
}
