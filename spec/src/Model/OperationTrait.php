<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes a trait that can be applied to an operation.
 */
class OperationTrait extends AsyncApiObject
{
    /**
     * A human-friendly title for the operation.
     */
    protected ?string $title = null;

    /**
     * A short summary of what the operation is about.
     */
    protected ?string $summary = null;

    /**
     * A verbose explanation of the operation.
     */
    protected ?string $description = null;

    /**
     * A declaration of which security mechanisms can be used for this operation.
     */
    protected array $security = [];

    /**
     * A list of tags for API documentation control.
     */
    protected array $tags = [];

    /**
     * Additional external documentation for this operation.
     */
    protected ?ExternalDocumentation $externalDocs = null;

    /**
     * A map of the bindings for this operation.
     */
    protected array $bindings = [];

    /**
     * The definition of the message that will be published or received by this operation.
     */
    protected Message|Reference|null $message = null;

    /**
     * The definition of the messages that will be published or received by this operation.
     */
    protected ?array $messages = null;

    /**
     * The definition of the reply message that will be sent back as a response to this operation.
     */
    protected ?array $reply = null;

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
     * @return array<SecurityRequirement>
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
        $this->security[] = $security;
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
     * @return array<string, mixed>
     */
    public function getBindings(): array
    {
        return $this->bindings;
    }

    /**
     * Add a binding.
     */
    public function addBinding(string $name, $binding): self
    {
        $this->bindings[$name] = $binding;
        return $this;
    }

    /**
     * Get the message.
     */
    public function getMessage(): Message|Reference|null
    {
        return $this->message;
    }

    /**
     * Set the message.
     */
    public function setMessage(Message|Reference $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the messages.
     *
     * @return array<Message|Reference>|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * Set the messages.
     *
     * @param array<Message|Reference> $messages The messages
     * @return $this
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Get the reply.
     *
     * @return array<Message|Reference>|null
     */
    public function getReply(): ?array
    {
        return $this->reply;
    }

    /**
     * Set the reply.
     *
     * @param array<Message|Reference> $reply The reply
     */
    public function setReply(array $reply): self
    {
        $this->reply = $reply;
        return $this;
    }
}
