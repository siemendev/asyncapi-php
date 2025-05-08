<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Adds metadata to a single tag that is used by the Operation Object.
 */
class Tag extends AsyncApiObject
{
    /**
     * The name of the tag.
     *
     * @var string
     */
    protected $name;
    
    /**
     * A short description for the tag.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * Additional external documentation for this tag.
     *
     * @var ExternalDocumentation|null
     */
    protected $externalDocs;
    
    /**
     * Constructor.
     *
     * @param string $name The name of the tag
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
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
     * Get the external documentation.
     *
     * @return ExternalDocumentation|null
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->externalDocs;
    }
    
    /**
     * Set the external documentation.
     *
     * @param ExternalDocumentation $externalDocs The external documentation
     * @return $this
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs): self
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }
}