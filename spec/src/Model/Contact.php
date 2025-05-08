<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Contact information for the exposed API.
 */
class Contact extends AsyncApiObject
{
    /**
     * The identifying name of the contact person/organization.
     *
     * @var string|null
     */
    protected $name;
    
    /**
     * The URL pointing to the contact information.
     *
     * @var string|null
     */
    protected $url;
    
    /**
     * The email address of the contact person/organization.
     *
     * @var string|null
     */
    protected $email;
    
    /**
     * Get the name of the contact person/organization.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * Set the name of the contact person/organization.
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
     * Get the URL pointing to the contact information.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    
    /**
     * Set the URL pointing to the contact information.
     *
     * @param string $url The URL
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }
    
    /**
     * Get the email address of the contact person/organization.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    /**
     * Set the email address of the contact person/organization.
     *
     * @param string $email The email address
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
}