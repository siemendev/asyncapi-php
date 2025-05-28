<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes a trait that can be applied to an operation.
 */
class OperationTrait extends AsyncApiObject
{
    /** A human-friendly title for the operation. */
    protected ?string $title = null;

    /** A short summary of what the operation is about. */
    protected ?string $summary = null;

    /** A verbose explanation of the operation. */
    protected ?string $description = null;

    /**
     * A declaration of which security mechanisms can be used for this operation.
     *
     * @var array<SecurityRequirement|Reference<SecurityRequirement>>
     */
    protected array $security = [];

    /**
     * A list of tags for API documentation control.
     *
     * @var array<Tag>
     */
    protected array $tags = [];

    /** Additional external documentation for this operation. */
    protected ?ExternalDocumentation $externalDocs = null;

    /**
     * A map of the bindings for this operation.
     *
     * @var array<string, AsyncApiObject|Reference<AsyncApiObject>>
     */
    protected array $bindings = [];

    /**
     * Get the title.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the title.
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the summary.
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * Set the summary.
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
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

    /**
     * Get the security requirements.
     *
     * @return array<SecurityRequirement|Reference<SecurityRequirement>>
     */
    public function getSecurity(): array
    {
        return $this->security;
    }

    /**
     * Add a security requirement.
     */
    public function addSecurity(SecurityRequirement $security): self
    {
        $this->security[] = $security->setParentElement($this);

        return $this;
    }

    /**
     * Get the tags.
     *
     * @return array<Tag>
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * Add a tag.
     */
    public function addTag(Tag $tag): self
    {
        $this->tags[] = $tag->setParentElement($this);

        return $this;
    }

    /**
     * Get the external documentation.
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->externalDocs;
    }

    /**
     * Set the external documentation.
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs): self
    {
        $this->externalDocs = $externalDocs->setParentElement($this);

        return $this;
    }

    /**
     * Get the bindings.
     *
     * @return array<string, AsyncApiObject|Reference<AsyncApiObject>>
     */
    public function getBindings(): array
    {
        return $this->bindings;
    }

    /**
     * Add a binding.
     */
    public function addBinding(string $name, AsyncApiObject $binding): self
    {
        $this->bindings[$name] = $binding->setParentElement($this);

        return $this;
    }
}
