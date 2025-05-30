<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Bindings\MessageBindings;

/**
 * Describes a message that can be published or received on a channel.
 */
class Message extends AsyncApiObject
{
    /**
     * Schema definition of the application headers.
     *
     * @var Schema|Reference<Schema>|null
     */
    protected Schema|Reference|null $headers = null;

    /**
     * Definition of the message payload.
     *
     * @var Schema|Reference<Schema>|null
     */
    protected Schema|Reference|null $payload = null;

    /** A machine-friendly name for the message. */
    protected ?string $name = null;

    /** A human-friendly title for the message. */
    protected ?string $title = null;

    /** A short summary of what the message is about. */
    protected ?string $summary = null;

    /** A verbose explanation of the message. */
    protected ?string $description = null;

    /**
     * A list of tags for API documentation control.
     *
     * @var array<Tag>
     */
    protected array $tags = [];

    /** Additional external documentation for this message. */
    protected ?ExternalDocumentation $externalDocs = null;

    /**
     * A map of the bindings for this message.
     *
     * @var MessageBindings|Reference<MessageBindings>
     */
    protected MessageBindings|Reference $bindings;

    /**
     * List of examples.
     *
     * @var array<MessageExample>
     */
    protected array $examples = [];

    /**
     * A list of traits to apply to the message object.
     *
     * @var array<MessageTrait|Reference<MessageTrait>>
     */
    protected array $traits = [];

    /** The content type to use when encoding/decoding a message's payload. */
    protected ?string $contentType = null;

    /** A string containing the name of the schema format used to define the message payload. */
    protected ?string $schemaFormat = null;

    /** The content type to use when encoding/decoding a message's headers. */
    protected ?string $headerFormat = null;

    /**
     * A map of the correlation ID objects.
     *
     * @var array<string, CorrelationId|Reference<CorrelationId>>
     */
    protected array $correlationIds = [];

    /**
     * Get the headers.
     *
     * @return Schema|Reference<Schema>|null
     */
    public function getHeaders(): Schema|Reference|null
    {
        return $this->headers;
    }

    /**
     * Set the headers.
     *
     * @param Schema|Reference<Schema> $headers
     */
    public function setHeaders(Schema|Reference $headers): self
    {
        $this->headers = $headers->setParentElement($this);

        return $this;
    }

    /**
     * Get the payload.
     *
     * @return Schema|Reference<Schema>|null
     */
    public function getPayload(): Schema|Reference|null
    {
        return $this->payload;
    }

    /**
     * Set the payload.
     *
     * @param Schema|Reference<Schema> $payload
     */
    public function setPayload(Schema|Reference $payload): self
    {
        $this->payload = $payload->setParentElement($this);

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
     * @return MessageBindings|Reference<MessageBindings>
     */
    public function getBindings(): MessageBindings|Reference
    {
        return $this->bindings;
    }

    /**
     * Set the bindings.
     *
     * @param MessageBindings|Reference<MessageBindings> $bindings
     */
    public function setBindings(MessageBindings|Reference $bindings): self
    {
        $this->bindings = $bindings->setParentElement($this);

        return $this;
    }

    /**
     * Resolves the reference to the bindings and returns a MessageBindings object.
     */
    public function resolveBindings(): MessageBindings
    {
        if ($this->bindings instanceof Reference) {
            return $this->bindings->resolve();
        }

        return $this->bindings;
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
        $this->examples[] = $example->setParentElement($this);

        return $this;
    }

    /**
     * Get the traits.
     *
     * @return array<MessageTrait|Reference<MessageTrait>>
     */
    public function getTraits(): array
    {
        return $this->traits;
    }

    /**
     * Add a trait.
     *
     * @param MessageTrait|Reference<MessageTrait> $trait
     */
    public function addTrait(MessageTrait|Reference $trait): self
    {
        $this->traits[] = $trait->setParentElement($this);

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
     * @throws InvalidSpecificationException
     */
    public function resolveContentType(): string
    {
        if ($this->contentType) {
            return $this->contentType;
        }

        $contentType = $this->getRootElement()->getDefaultContentType();
        if (!$contentType) {
            throw new InvalidSpecificationException('No content type defined for message nor default content type defined in spec');
        }

        return $contentType;
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
     * @return array<string, CorrelationId|Reference<CorrelationId>>
     */
    public function getCorrelationIds(): array
    {
        return $this->correlationIds;
    }

    /**
     * Add a correlation ID.
     *
     * @param CorrelationId|Reference<CorrelationId> $correlationId
     */
    public function addCorrelationId(string $name, CorrelationId|Reference $correlationId): self
    {
        $this->correlationIds[$name] = $correlationId->setParentElement($this);

        return $this;
    }

    /**
     * Resolves the reference to the headers and returns a Schema object.
     */
    public function resolveHeaders(): ?Schema
    {
        if ($this->headers instanceof Reference) {
            return $this->headers->resolve();
        }

        return $this->headers;
    }

    /**
     * Resolves the reference to the payload and returns a Schema object.
     */
    public function resolvePayload(): ?Schema
    {
        if ($this->payload instanceof Reference) {
            return $this->payload->resolve();
        }

        return $this->payload;
    }

    /**
     * Resolves the references to the traits and returns an array of MessageTrait objects.
     *
     * @return array<MessageTrait>
     */
    public function resolveTraits(): array
    {
        $traits = [];
        foreach ($this->traits as $trait) {
            if ($trait instanceof Reference) {
                $traits[] = $trait->resolve();
            } else {
                $traits[] = $trait;
            }
        }

        return $traits;
    }

    /**
     * Resolves the references to the correlation IDs and returns an array of CorrelationId objects.
     *
     * @return array<string, CorrelationId>
     */
    public function resolveCorrelationIds(): array
    {
        $correlationIds = [];
        foreach ($this->correlationIds as $name => $correlationId) {
            if ($correlationId instanceof Reference) {
                $correlationIds[$name] = $correlationId->resolve();
            } else {
                $correlationIds[$name] = $correlationId;
            }
        }

        return $correlationIds;
    }
}
