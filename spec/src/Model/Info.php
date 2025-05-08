<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Provides metadata about the API.
 * 
 * The Info object provides metadata about the API. The metadata can be used by the
 * clients if needed, and can be presented in editing or documentation generation tools.
 */
class Info extends AsyncApiObject
{
    /**
     * The title of the application.
     *
     * @var string
     */
    protected $title;
    
    /**
     * The version of the application API (not to be confused with the specification version).
     *
     * @var string
     */
    protected $version;
    
    /**
     * A short description of the application.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * A URL to the Terms of Service for the API.
     *
     * @var string|null
     */
    protected $termsOfService;
    
    /**
     * The contact information for the exposed API.
     *
     * @var Contact|null
     */
    protected $contact;
    
    /**
     * The license information for the exposed API.
     *
     * @var License|null
     */
    protected $license;
    
    /**
     * Constructor.
     *
     * @param string $title The title of the application
     * @param string $version The version of the application API
     */
    public function __construct(string $title, string $version)
    {
        $this->title = $title;
        $this->version = $version;
    }
    
    /**
     * Get the title of the application.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Get the version of the application API.
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
    
    /**
     * Get the description of the application.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    /**
     * Set the description of the application.
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
     * Get the Terms of Service URL.
     *
     * @return string|null
     */
    public function getTermsOfService(): ?string
    {
        return $this->termsOfService;
    }
    
    /**
     * Set the Terms of Service URL.
     *
     * @param string $termsOfService The Terms of Service URL
     * @return $this
     */
    public function setTermsOfService(string $termsOfService): self
    {
        $this->termsOfService = $termsOfService;
        return $this;
    }
    
    /**
     * Get the contact information.
     *
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }
    
    /**
     * Set the contact information.
     *
     * @param Contact $contact The contact information
     * @return $this
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;
        return $this;
    }
    
    /**
     * Get the license information.
     *
     * @return License|null
     */
    public function getLicense(): ?License
    {
        return $this->license;
    }
    
    /**
     * Set the license information.
     *
     * @param License $license The license information
     * @return $this
     */
    public function setLicense(License $license): self
    {
        $this->license = $license;
        return $this;
    }
}