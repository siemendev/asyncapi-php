<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Configuration details for a supported OAuth Flow.
 */
class OAuthFlow extends AsyncApiObject
{
    /**
     * The authorization URL to be used for this flow.
     */
    protected ?string $authorizationUrl = null;

    /**
     * The token URL to be used for this flow.
     */
    protected ?string $tokenUrl = null;

    /**
     * The URL to be used for obtaining refresh tokens.
     */
    protected ?string $refreshUrl = null;

    /**
     * The available scopes for the OAuth2 security scheme.
     */
    protected array $scopes = [];

    /**
     * Get the authorization URL.
     */
    public function getAuthorizationUrl(): ?string
    {
        return $this->authorizationUrl;
    }

    /**
     * Set the authorization URL.
     */
    public function setAuthorizationUrl(string $authorizationUrl): self
    {
        $this->authorizationUrl = $authorizationUrl;
        return $this;
    }

    /**
     * Get the token URL.
     */
    public function getTokenUrl(): ?string
    {
        return $this->tokenUrl;
    }

    /**
     * Set the token URL.
     */
    public function setTokenUrl(string $tokenUrl): self
    {
        $this->tokenUrl = $tokenUrl;
        return $this;
    }

    /**
     * Get the refresh URL.
     */
    public function getRefreshUrl(): ?string
    {
        return $this->refreshUrl;
    }

    /**
     * Set the refresh URL.
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
     * @param array<string, string> $scopes
     */
    public function setScopes(array $scopes): self
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * Add a scope.
     */
    public function addScope(string $name, string $description): self
    {
        $this->scopes[$name] = $description;
        return $this;
    }
}
