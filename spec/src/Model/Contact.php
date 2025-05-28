<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Contact information for the exposed API.
 */
class Contact extends AsyncApiObject
{
    /** The identifying name of the contact person/organization. */
    protected ?string $name = null;

    /** The URL pointing to the contact information. */
    protected ?string $url = null;

    /** The email address of the contact person/organization. */
    protected ?string $email = null;

    /**
     * Get the name of the contact person/organization.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name of the contact person/organization.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the URL pointing to the contact information.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Set the URL pointing to the contact information.
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the email address of the contact person/organization.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the email address of the contact person/organization.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
