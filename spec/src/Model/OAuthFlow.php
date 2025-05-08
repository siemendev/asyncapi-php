<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Configuration details for a supported OAuth Flow.
 */
class OAuthFlow extends AsyncApiObject
{
    /**
     * The authorization URL to be used for this flow.
     *
     * @var string|null
     */
    protected $authorizationUrl;
    
    /**
     * The token URL to be used for this flow.
     *
     * @var string|null
     */
    protected $tokenUrl;
    
    /**
     * The URL to be used for obtaining refresh tokens.
     *
     * @var string|null
     */
    protected $refreshUrl;
    
    /**
     * The available scopes for the OAuth2 security scheme.
     *
     * @var array<string, string>
     */
    protected $scopes = [];
    
    /**
     * Get the authorization URL.
     *
     * @return string|null
     */
    public function getAuthorizationUrl(): ?string
    {
        return $this->authorizationUrl;
    }
    
    /**
     * Set the authorization URL.
     *
     * @param string $authorizationUrl The authorization URL
     * @return $this
     */
    public function setAuthorizationUrl(string $authorizationUrl): self
    {
        $this->authorizationUrl = $authorizationUrl;
        return $this;
    }
    
    /**
     * Get the token URL.
     *
     * @return string|null
     */
    public function getTokenUrl(): ?string
    {
        return $this->tokenUrl;
    }
    
    /**
     * Set the token URL.
     *
     * @param string $tokenUrl The token URL
     * @return $this
     */
    public function setTokenUrl(string $tokenUrl): self
    {
        $this->tokenUrl = $tokenUrl;
        return $this;
    }
    
    /**
     * Get the refresh URL.
     *
     * @return string|null
     */
    public function getRefreshUrl(): ?string
    {
        return $this->refreshUrl;
    }
    
    /**
     * Set the refresh URL.
     *
     * @param string $refreshUrl The refresh URL
     * @return $this
     */
    public function setRefreshUrl(string $refreshUrl): self
    {
        $this->refreshUrl = $refreshUrl;
        return $this;
    }
    
    /**
     * Get the scopes.
     *
     * @return array<string, string>
     */
    public function getScopes(): array
    {
        return $this->scopes;
    }
    
    /**
     * Set the scopes.
     *
     * @param array<string, string> $scopes The scopes
     * @return $this
     */
    public function setScopes(array $scopes): self
    {
        $this->scopes = $scopes;
        return $this;
    }
    
    /**
     * Add a scope.
     *
     * @param string $name The scope name
     * @param string $description The scope description
     * @return $this
     */
    public function addScope(string $name, string $description): self
    {
        $this->scopes[$name] = $description;
        return $this;
    }
}