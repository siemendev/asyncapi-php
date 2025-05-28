<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * License information for the exposed API.
 */
class License extends AsyncApiObject
{
    /** The license name used for the API. */
    protected string $name;

    /** A URL to the license used for the API. */
    protected ?string $url = null;

    /**
     * Constructor.
     *
     * @param string $name The license name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the license name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the license URL.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Set the license URL.
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
