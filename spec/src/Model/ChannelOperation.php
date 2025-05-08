<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes an operation available on a channel.
 */
class ChannelOperation extends AsyncApiObject
{
    /**
     * The operation this channel is related to.
     *
     * @var string
     */
    protected $operationId;
    
    /**
     * A human-friendly title for the operation.
     *
     * @var string|null
     */
    protected $title;
    
    /**
     * A short summary of what the operation is about.
     *
     * @var string|null
     */
    protected $summary;
    
    /**
     * A verbose explanation of the operation.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * A list of tags for API documentation control.
     *
     * @var array<Tag>
     */
    protected $tags = [];
    
    /**
     * Additional external documentation for this operation.
     *
     * @var ExternalDocumentation|null
     */
    protected $externalDocs;
    
    /**
     * A map of the bindings for this operation.
     *
     * @var array<string, mixed>
     */
    protected $bindings = [];
    
    /**
     * Constructor.
     *
     * @param string $operationId The operation ID
     */
    public function __construct(string $operationId)
    {
        $this->operationId = $operationId;
    }
    
    /**
     * Get the operation ID.
     *
     * @return string
     */
    public function getOperationId(): string
    {
        return $this->operationId;
    }
    
    /**
     * Get the title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    /**
     * Set the title.
     *
     * @param string $title The title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Get the summary.
     *
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }
    
    /**
     * Set the summary.
     *
     * @param string $summary The summary
     * @return $this
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }
    
    /**
     * Get the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    /**
     * Set the description.
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
     *
     * @param Tag $tag The tag
     * @return $this
     */
    public function addTag(Tag $tag): self
    {
        $this->tags[] = $tag;
        return $this;
    }
    
    /**
     * Get the external documentation.
     *
     * @return ExternalDocumentation|null
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->externalDocs;
    }
    
    /**
     * Set the external documentation.
     *
     * @param ExternalDocumentation $externalDocs The external documentation
     * @return $this
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs): self
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }
    
    /**
     * Get the bindings.
     *
     * @return array<string, mixed>
     */
    public function getBindings(): array
    {
        return $this->bindings;
    }
    
    /**
     * Add a binding.
     *
     * @param string $name The binding name
     * @param mixed $binding The binding
     * @return $this
     */
    public function addBinding(string $name, $binding): self
    {
        $this->bindings[$name] = $binding;
        return $this;
    }
}