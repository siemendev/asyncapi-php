<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * License information for the exposed API.
 */
class License extends AsyncApiObject
{
    /**
     * The license name used for the API.
     *
     * @var string
     */
    protected $name;
    
    /**
     * A URL to the license used for the API.
     *
     * @var string|null
     */
    protected $url;
    
    /**
     * Constructor.
     *
     * @param string $name The license name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    /**
     * Get the license name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * Get the license URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    
    /**
     * Set the license URL.
     *
     * @param string $url The license URL
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }
}