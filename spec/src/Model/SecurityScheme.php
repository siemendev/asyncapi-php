<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Defines a security scheme that can be used by the operations.
 */
class SecurityScheme extends AsyncApiObject
{
    /**
     * The type of the security scheme.
     */
    protected string $type;

    /**
     * A short description for security scheme.
     */
    protected ?string $description = null;

    /**
     * The name of the header, query or cookie parameter to be used.
     */
    protected ?string $name = null;

    /**
     * The location of the API key.
     */
    protected ?string $in = null;

    /**
     * The name of the HTTP Authorization scheme to be used in the Authorization header.
     */
    protected ?string $scheme = null;

    /**
     * A hint to the client to identify how the bearer token is formatted.
     */
    protected ?string $bearerFormat = null;

    /**
     * An object containing configuration information for the flow types supported.
     */
    protected ?OAuthFlows $flows = null;

    /**
     * OpenId Connect URL to discover OAuth2 configuration values.
     */
    protected ?string $openIdConnectUrl = null;

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
     */
    public function getType(): string
    {
        return $this->type;
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
     * Get the name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the location.
     */
    public function getIn(): ?string
    {
        return $this->in;
    }

    /**
     * Set the location.
     */
    public function setIn(string $in): self
    {
        $this->in = $in;
        return $this;
    }

    /**
     * Get the scheme.
     */
    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    /**
     * Set the scheme.
     */
    public function setScheme(string $scheme): self
    {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * Get the bearer format.
     */
    public function getBearerFormat(): ?string
    {
        return $this->bearerFormat;
    }

    /**
     * Set the bearer format.
     */
    public function setBearerFormat(string $bearerFormat): self
    {
        $this->bearerFormat = $bearerFormat;
        return $this;
    }

    /**
     * Get the flows.
     */
    public function getFlows(): ?OAuthFlows
    {
        return $this->flows;
    }

    /**
     * Set the flows.
     */
    public function setFlows(OAuthFlows $flows): self
    {
        $this->flows = $flows->setParentElement($this);
        return $this;
    }

    /**
     * Get the OpenId Connect URL.
     */
    public function getOpenIdConnectUrl(): ?string
    {
        return $this->openIdConnectUrl;
    }

    /**
     * Set the OpenId Connect URL.
     */
    public function setOpenIdConnectUrl(string $openIdConnectUrl): self
    {
        $this->openIdConnectUrl = $openIdConnectUrl;
        return $this;
    }
}
