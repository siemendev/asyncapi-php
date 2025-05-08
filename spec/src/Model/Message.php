<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes a message that can be published or received on a channel.
 */
class Message extends AsyncApiObject
{
    /**
     * Schema definition of the application headers.
     *
     * @var Schema|Reference|null
     */
    protected $headers;
    
    /**
     * Definition of the message payload.
     *
     * @var Schema|Reference|null
     */
    protected $payload;
    
    /**
     * A machine-friendly name for the message.
     *
     * @var string|null
     */
    protected $name;
    
    /**
     * A human-friendly title for the message.
     *
     * @var string|null
     */
    protected $title;
    
    /**
     * A short summary of what the message is about.
     *
     * @var string|null
     */
    protected $summary;
    
    /**
     * A verbose explanation of the message.
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
     * Additional external documentation for this message.
     *
     * @var ExternalDocumentation|null
     */
    protected $externalDocs;
    
    /**
     * A map of the bindings for this message.
     *
     * @var array<string, mixed>
     */
    protected $bindings = [];
    
    /**
     * List of examples.
     *
     * @var array<MessageExample>
     */
    protected $examples = [];
    
    /**
     * A list of traits to apply to the message object.
     *
     * @var array<MessageTrait|Reference>
     */
    protected $traits = [];
    
    /**
     * The content type to use when encoding/decoding a message's payload.
     *
     * @var string|null
     */
    protected $contentType;
    
    /**
     * A string containing the name of the schema format used to define the message payload.
     *
     * @var string|null
     */
    protected $schemaFormat;
    
    /**
     * The content type to use when encoding/decoding a message's headers.
     *
     * @var string|null
     */
    protected $headerFormat;
    
    /**
     * A map of the correlation ID objects.
     *
     * @var array<string, CorrelationId|Reference>
     */
    protected $correlationIds = [];
    
    /**
     * Get the headers.
     *
     * @return Schema|Reference|null
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    
    /**
     * Set the headers.
     *
     * @param Schema|Reference $headers The headers
     * @return $this
     */
    public function setHeaders($headers): self
    {
        $this->headers = $headers;
        return $this;
    }
    
    /**
     * Get the payload.
     *
     * @return Schema|Reference|null
     */
    public function getPayload()
    {
        return $this->payload;
    }
    
    /**
     * Set the payload.
     *
     * @param Schema|Reference $payload The payload
     * @return $this
     */
    public function setPayload($payload): self
    {
        $this->payload = $payload;
        return $this;
    }
    
    /**
     * Get the name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * Set the name.
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
    
    /**
     * Get the examples.
     *
     * @return array<MessageExample>
     */
    public function getExamples(): array
    {
        return $this->examples;
    }
    
    /**
     * Add an example.
     *
     * @param MessageExample $example The example
     * @return $this
     */
    public function addExample(MessageExample $example): self
    {
        $this->examples[] = $example;
        return $this;
    }
    
    /**
     * Get the traits.
     *
     * @return array<MessageTrait|Reference>
     */
    public function getTraits(): array
    {
        return $this->traits;
    }
    
    /**
     * Add a trait.
     *
     * @param MessageTrait|Reference $trait The trait
     * @return $this
     */
    public function addTrait($trait): self
    {
        $this->traits[] = $trait;
        return $this;
    }
    
    /**
     * Get the content type.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    
    /**
     * Set the content type.
     *
     * @param string $contentType The content type
     * @return $this
     */
    public function setContentType(string $contentType): self
    {
        $this->contentType = $contentType;
        return $this;
    }
    
    /**
     * Get the schema format.
     *
     * @return string|null
     */
    public function getSchemaFormat(): ?string
    {
        return $this->schemaFormat;
    }
    
    /**
     * Set the schema format.
     *
     * @param string $schemaFormat The schema format
     * @return $this
     */
    public function setSchemaFormat(string $schemaFormat): self
    {
        $this->schemaFormat = $schemaFormat;
        return $this;
    }
    
    /**
     * Get the header format.
     *
     * @return string|null
     */
    public function getHeaderFormat(): ?string
    {
        return $this->headerFormat;
    }
    
    /**
     * Set the header format.
     *
     * @param string $headerFormat The header format
     * @return $this
     */
    public function setHeaderFormat(string $headerFormat): self
    {
        $this->headerFormat = $headerFormat;
        return $this;
    }
    
    /**
     * Get the correlation IDs.
     *
     * @return array<string, CorrelationId|Reference>
     */
    public function getCorrelationIds(): array
    {
        return $this->correlationIds;
    }
    
    /**
     * Add a correlation ID.
     *
     * @param string $name The correlation ID name
     * @param CorrelationId|Reference $correlationId The correlation ID
     * @return $this
     */
    public function addCorrelationId(string $name, $correlationId): self
    {
        $this->correlationIds[$name] = $correlationId;
        return $this;
    }
}