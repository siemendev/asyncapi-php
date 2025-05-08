<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Allows configuration of the supported OAuth Flows.
 */
class OAuthFlows extends AsyncApiObject
{
    /**
     * Configuration for the OAuth Implicit flow.
     *
     * @var OAuthFlow|null
     */
    protected $implicit;
    
    /**
     * Configuration for the OAuth Resource Owner Password flow.
     *
     * @var OAuthFlow|null
     */
    protected $password;
    
    /**
     * Configuration for the OAuth Client Credentials flow.
     *
     * @var OAuthFlow|null
     */
    protected $clientCredentials;
    
    /**
     * Configuration for the OAuth Authorization Code flow.
     *
     * @var OAuthFlow|null
     */
    protected $authorizationCode;
    
    /**
     * Get the implicit flow.
     *
     * @return OAuthFlow|null
     */
    public function getImplicit(): ?OAuthFlow
    {
        return $this->implicit;
    }
    
    /**
     * Set the implicit flow.
     *
     * @param OAuthFlow $implicit The implicit flow
     * @return $this
     */
    public function setImplicit(OAuthFlow $implicit): self
    {
        $this->implicit = $implicit;
        return $this;
    }
    
    /**
     * Get the password flow.
     *
     * @return OAuthFlow|null
     */
    public function getPassword(): ?OAuthFlow
    {
        return $this->password;
    }
    
    /**
     * Set the password flow.
     *
     * @param OAuthFlow $password The password flow
     * @return $this
     */
    public function setPassword(OAuthFlow $password): self
    {
        $this->password = $password;
        return $this;
    }
    
    /**
     * Get the client credentials flow.
     *
     * @return OAuthFlow|null
     */
    public function getClientCredentials(): ?OAuthFlow
    {
        return $this->clientCredentials;
    }
    
    /**
     * Set the client credentials flow.
     *
     * @param OAuthFlow $clientCredentials The client credentials flow
     * @return $this
     */
    public function setClientCredentials(OAuthFlow $clientCredentials): self
    {
        $this->clientCredentials = $clientCredentials;
        return $this;
    }
    
    /**
     * Get the authorization code flow.
     *
     * @return OAuthFlow|null
     */
    public function getAuthorizationCode(): ?OAuthFlow
    {
        return $this->authorizationCode;
    }
    
    /**
     * Set the authorization code flow.
     *
     * @param OAuthFlow $authorizationCode The authorization code flow
     * @return $this
     */
    public function setAuthorizationCode(OAuthFlow $authorizationCode): self
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }
}