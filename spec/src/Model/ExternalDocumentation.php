<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Allows referencing an external resource for extended documentation.
 */
class ExternalDocumentation extends AsyncApiObject
{
    /**
     * The URL for the target documentation.
     *
     * @var string
     */
    protected $url;
    
    /**
     * A short description of the target documentation.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * Constructor.
     *
     * @param string $url The URL for the target documentation
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }
    
    /**
     * Get the URL.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
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
}