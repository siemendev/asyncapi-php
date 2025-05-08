<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Defines a security scheme that can be used by the operations.
 */
class SecurityScheme extends AsyncApiObject
{
    /**
     * The type of the security scheme.
     *
     * @var string
     */
    protected $type;
    
    /**
     * A short description for security scheme.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * The name of the header, query or cookie parameter to be used.
     *
     * @var string|null
     */
    protected $name;
    
    /**
     * The location of the API key.
     *
     * @var string|null
     */
    protected $in;
    
    /**
     * The name of the HTTP Authorization scheme to be used in the Authorization header.
     *
     * @var string|null
     */
    protected $scheme;
    
    /**
     * A hint to the client to identify how the bearer token is formatted.
     *
     * @var string|null
     */
    protected $bearerFormat;
    
    /**
     * An object containing configuration information for the flow types supported.
     *
     * @var OAuthFlows|null
     */
    protected $flows;
    
    /**
     * OpenId Connect URL to discover OAuth2 configuration values.
     *
     * @var string|null
     */
    protected $openIdConnectUrl;
    
    /**
     * Constructor.
     *
     * @param string $type The type of the security scheme
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }
    
    /**
     * Get the type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
     * Get the name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * Set the name.
     *
     * @param string $name The name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * Get the location.
     *
     * @return string|null
     */
    public function getIn(): ?string
    {
        return $this->in;
    }
    
    /**
     * Set the location.
     *
     * @param string $in The location
     * @return $this
     */
    public function setIn(string $in): self
    {
        $this->in = $in;
        return $this;
    }
    
    /**
     * Get the scheme.
     *
     * @return string|null
     */
    public function getScheme(): ?string
    {
        return $this->scheme;
    }
    
    /**
     * Set the scheme.
     *
     * @param string $scheme The scheme
     * @return $this
     */
    public function setScheme(string $scheme): self
    {
        $this->scheme = $scheme;
        return $this;
    }
    
    /**
     * Get the bearer format.
     *
     * @return string|null
     */
    public function getBearerFormat(): ?string
    {
        return $this->bearerFormat;
    }
    
    /**
     * Set the bearer format.
     *
     * @param string $bearerFormat The bearer format
     * @return $this
     */
    public function setBearerFormat(string $bearerFormat): self
    {
        $this->bearerFormat = $bearerFormat;
        return $this;
    }
    
    /**
     * Get the flows.
     *
     * @return OAuthFlows|null
     */
    public function getFlows(): ?OAuthFlows
    {
        return $this->flows;
    }
    
    /**
     * Set the flows.
     *
     * @param OAuthFlows $flows The flows
     * @return $this
     */
    public function setFlows(OAuthFlows $flows): self
    {
        $this->flows = $flows;
        return $this;
    }
    
    /**
     * Get the OpenId Connect URL.
     *
     * @return string|null
     */
    public function getOpenIdConnectUrl(): ?string
    {
        return $this->openIdConnectUrl;
    }
    
    /**
     * Set the OpenId Connect URL.
     *
     * @param string $openIdConnectUrl The OpenId Connect URL
     * @return $this
     */
    public function setOpenIdConnectUrl(string $openIdConnectUrl): self
    {
        $this->openIdConnectUrl = $openIdConnectUrl;
        return $this;
    }
}