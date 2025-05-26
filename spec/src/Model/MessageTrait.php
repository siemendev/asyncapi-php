<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes a trait that can be applied to a message.
 */
class MessageTrait extends AsyncApiObject
{
    /**
     * Schema definition of the application headers.
     */
    protected Schema|Reference|null $headers = null;

    /**
     * Definition of the message payload.
     */
    protected Schema|Reference|null $payload = null;

    /**
     * A machine-friendly name for the message.
     */
    protected ?string $name = null;

    /**
     * A human-friendly title for the message.
     */
    protected ?string $title = null;

    /**
     * A short summary of what the message is about.
     */
    protected ?string $summary = null;

    /**
     * A verbose explanation of the message.
     */
    protected ?string $description = null;

    /**
     * A list of tags for API documentation control.
     *
     * @var array<Tag>
     */
    protected array $tags = [];

    /**
     * Additional external documentation for this message.
     */
    protected ?ExternalDocumentation $externalDocs = null;

    /**
     * A map of the bindings for this message.
     *
     * @var array<string, AsyncApiObject>
     */
    protected array $bindings = [];

    /**
     * List of examples.
     *
     * @var array<MessageExample>
     */
    protected array $examples = [];

    /**
     * The content type to use when encoding/decoding a message's payload.
     */
    protected ?string $contentType = null;

    /**
     * A string containing the name of the schema format used to define the message payload.
     */
    protected ?string $schemaFormat = null;

    /**
     * The content type to use when encoding/decoding a message's headers.
     */
    protected ?string $headerFormat = null;

    /**
     * A map of the correlation ID objects.
     *
     * @var array<string, CorrelationId|Reference>
     */
    protected array $correlationIds = [];

    /**
     * Get the headers.
     */
    public function getHeaders(): Schema|Reference|null
    {
        return $this->headers;
    }

    /**
     * Set the headers.
     */
    public function setHeaders(Schema|Reference $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Get the payload.
     */
    public function getPayload(): Schema|Reference|null
    {
        return $this->payload;
    }

    /**
     * Set the payload.
     */
    public function setPayload(Schema|Reference $payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * Get the name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

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
        $this->tags[] = $tag;
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
        $this->externalDocs = $externalDocs;
        return $this;
    }

    /**
     * Get the bindings.
     *
     * @return array<string, AsyncApiObject>
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
     */
    public function addExample(MessageExample $example): self
    {
        $this->examples[] = $example;
        return $this;
    }

    /**
     * Get the content type.
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * Set the content type.
     */
    public function setContentType(string $contentType): self
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * Get the schema format.
     */
    public function getSchemaFormat(): ?string
    {
        return $this->schemaFormat;
    }

    /**
     * Set the schema format.
     */
    public function setSchemaFormat(string $schemaFormat): self
    {
        $this->schemaFormat = $schemaFormat;
        return $this;
    }

    /**
     * Get the header format.
     */
    public function getHeaderFormat(): ?string
    {
        return $this->headerFormat;
    }

    /**
     * Set the header format.
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
     */
    public function addCorrelationId(string $name, CorrelationId|Reference $correlationId): self
    {
        $this->correlationIds[$name] = $correlationId;
        return $this;
    }
}
