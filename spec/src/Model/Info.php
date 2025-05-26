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
     */
    protected string $title;

    /**
     * The version of the application API (not to be confused with the specification version).
     */
    protected string $version;

    /**
     * A short description of the application.
     */
    protected ?string $description = null;

    /**
     * A URL to the Terms of Service for the API.
     */
    protected ?string $termsOfService = null;

    /**
     * The contact information for the exposed API.
     */
    protected ?Contact $contact = null;

    /**
     * The license information for the exposed API.
     */
    protected ?License $license = null;

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
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the version of the application API.
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Get the description of the application.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the description of the application.
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the Terms of Service URL.
     */
    public function getTermsOfService(): ?string
    {
        return $this->termsOfService;
    }

    /**
     * Set the Terms of Service URL.
     */
    public function setTermsOfService(string $termsOfService): self
    {
        $this->termsOfService = $termsOfService;
        return $this;
    }

    /**
     * Get the contact information.
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * Set the contact information.
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * Get the license information.
     */
    public function getLicense(): ?License
    {
        return $this->license;
    }

    /**
     * Set the license information.
     */
    public function setLicense(License $license): self
    {
        $this->license = $license;
        return $this;
    }
}
