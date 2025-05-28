<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Allows configuration of the supported OAuth Flows.
 */
class OAuthFlows extends AsyncApiObject
{
    /** Configuration for the OAuth Implicit flow. */
    protected ?OAuthFlow $implicit = null;

    /** Configuration for the OAuth Resource Owner Password flow. */
    protected ?OAuthFlow $password = null;

    /** Configuration for the OAuth Client Credentials flow. */
    protected ?OAuthFlow $clientCredentials = null;

    /** Configuration for the OAuth Authorization Code flow. */
    protected ?OAuthFlow $authorizationCode = null;

    /**
     * Get the implicit flow.
     */
    public function getImplicit(): ?OAuthFlow
    {
        return $this->implicit;
    }

    /**
     * Set the implicit flow.
     */
    public function setImplicit(OAuthFlow $implicit): self
    {
        $this->implicit = $implicit->setParentElement($this);

        return $this;
    }

    /**
     * Get the password flow.
     */
    public function getPassword(): ?OAuthFlow
    {
        return $this->password;
    }

    /**
     * Set the password flow.
     */
    public function setPassword(OAuthFlow $password): self
    {
        $this->password = $password->setParentElement($this);

        return $this;
    }

    /**
     * Get the client credentials flow.
     */
    public function getClientCredentials(): ?OAuthFlow
    {
        return $this->clientCredentials;
    }

    /**
     * Set the client credentials flow.
     */
    public function setClientCredentials(OAuthFlow $clientCredentials): self
    {
        $this->clientCredentials = $clientCredentials->setParentElement($this);

        return $this;
    }

    /**
     * Get the authorization code flow.
     */
    public function getAuthorizationCode(): ?OAuthFlow
    {
        return $this->authorizationCode;
    }

    /**
     * Set the authorization code flow.
     */
    public function setAuthorizationCode(OAuthFlow $authorizationCode): self
    {
        $this->authorizationCode = $authorizationCode->setParentElement($this);

        return $this;
    }
}
