<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * When request bodies or response payloads may be one of a number of different schemas,
 * a discriminator object can be used to aid in serialization, deserialization, and validation.
 */
class Discriminator extends AsyncApiObject
{
    /**
     * The name of the property in the payload that will hold the discriminator value.
     */
    protected string $propertyName;

    /**
     * An object to hold mappings between payload values and schema names or references.
     *
     * @var array<string, string>
     */
    protected array $mapping = [];

    /**
     * Constructor.
     *
     * @param string $propertyName The name of the property in the payload that will hold the discriminator value
     */
    public function __construct(string $propertyName)
    {
        $this->propertyName = $propertyName;
    }

    /**
     * Get the property name.
     */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * Get the mapping.
     *
     * @return array<string, string>
     */
    public function getMapping(): array
    {
        return $this->mapping;
    }

    /**
     * Set the mapping.
     *
     * @param array<string, string> $mapping The mapping
     * @return $this
     */
    public function setMapping(array $mapping): self
    {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Add a mapping.
     */
    public function addMapping(string $value, string $schema): self
    {
        $this->mapping[$value] = $schema;
        return $this;
    }
}
