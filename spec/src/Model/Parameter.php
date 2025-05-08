<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes a parameter included in a channel address.
 */
class Parameter extends AsyncApiObject
{
    /**
     * A brief description of the parameter.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * The location of the parameter.
     *
     * @var string|null
     */
    protected $location;
    
    /**
     * The schema defining the type used for the parameter.
     *
     * @var Schema|Reference|null
     */
    protected $schema;
    
    /**
     * Get the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    /**
     * Set the description.
     *
     * @param string $description The description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * Get the location.
     *
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }
    
    /**
     * Set the location.
     *
     * @param string $location The location
     * @return $this
     */
    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }
    
    /**
     * Get the schema.
     *
     * @return Schema|Reference|null
     */
    public function getSchema()
    {
        return $this->schema;
    }
    
    /**
     * Set the schema.
     *
     * @param Schema|Reference $schema The schema
     * @return $this
     */
    public function setSchema($schema): self
    {
        $this->schema = $schema;
        return $this;
    }
}