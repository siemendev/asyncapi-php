<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Allows referencing an external resource for extended documentation.
 */
class ExternalDocumentation extends AsyncApiObject
{
    /** The URL for the target documentation. */
    protected string $url;

    /** A short description of the target documentation. */
    protected ?string $description = null;

    /**
     * Constructor.
     *
     * @param string $url The URL for the target documentation
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Get the URL.
     */
    public function getUrl(): string
    {
        return $this->url;
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
}
