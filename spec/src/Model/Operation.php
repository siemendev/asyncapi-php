<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes an operation that can be performed on a channel.
 */
class Operation extends AsyncApiObject
{
    /**
     * Required. Use send when it's expected that the application will send a message to the given channel,
     * and receive when the application should expect receiving messages from the given channel.
     */
    protected string $action;

    /**
     * Required. A $ref pointer to the definition of the channel in which this operation is performed.
     */
    protected Reference $channel;

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
     * A declaration of which security schemes are associated with this operation.
     * Only one of the security scheme objects MUST be satisfied to authorize an operation.
     */
    protected array $security = [];

    /**
     * A list of tags for logical grouping and categorization of operations.
     */
    protected array $tags = [];

    /**
     * Additional external documentation for this operation.
     */
    protected ExternalDocumentation|Reference|null $externalDocs = null;

    /**
     * A map where the keys describe the name of the protocol and the values describe protocol-specific definitions for the operation.
     */
    protected array|Reference $bindings = [];

    /**
     * A list of traits to apply to the operation object.
     */
    protected array $traits = [];

    /**
     * The definition of the message that will be published or received by this operation.
     */
    protected Message|Reference|null $message = null;

    /**
     * A list of $ref pointers pointing to the supported Message Objects that can be processed by this operation.
     */
    protected ?array $messages = null;

    /**
     * The definition of the reply in a request-reply operation.
     */
    protected mixed $reply = null;

    /**
     * A map of possible out-of-band callbacks related to the parent operation.
     */
    protected array $callbacks = [];

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
     * Get the action.
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * Set the action.
     *
     * @param string $action The action ("send" or "receive")
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get the channel.
     */
    public function getChannel(): ?Reference
    {
        return $this->channel;
    }

    /**
     * Set the channel.
     */
    public function setChannel(Reference $channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * Get the security requirements.
     */
    public function getSecurity(): array
    {
        return $this->security;
    }

    /**
     * Add a security requirement.
     */
    public function addSecurity(SecurityScheme|Reference $security): self
    {
        $this->security[] = $security;
        return $this;
    }

    /**
     * Get the tags.
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
    public function getExternalDocs(): ExternalDocumentation|Reference|null
    {
        return $this->externalDocs;
    }

    /**
     * Set the external documentation.
     */
    public function setExternalDocs(ExternalDocumentation|Reference $externalDocs): self
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }

    /**
     * Get the bindings.
     */
    public function getBindings(): array|Reference
    {
        return $this->bindings;
    }

    /**
     * Set the bindings.
     */
    public function setBindings(array|Reference $bindings): self
    {
        $this->bindings = $bindings;
        return $this;
    }

    /**
     * Add a binding.
     */
    public function addBinding(string $name, mixed $binding): self
    {
        if (!is_array($this->bindings)) {
            $this->bindings = [];
        }
        $this->bindings[$name] = $binding;
        return $this;
    }

    /**
     * Get the traits.
     */
    public function getTraits(): array
    {
        return $this->traits;
    }

    /**
     * Add a trait.
     */
    public function addTrait(OperationTrait|Reference $trait): self
    {
        $this->traits[] = $trait;
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
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * Set the messages.
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Add a message reference.
     */
    public function addMessage(Reference $message): self
    {
        if ($this->messages === null) {
            $this->messages = [];
        }
        $this->messages[] = $message;
        return $this;
    }

    /**
     * Get the reply.
     */
    public function getReply(): mixed
    {
        return $this->reply;
    }

    /**
     * Set the reply.
     *
     * @param mixed|Reference $reply The reply or reference
     * @return $this
     */
    public function setReply(mixed $reply): self
    {
        $this->reply = $reply;
        return $this;
    }

    /**
     * Get the callbacks.
     */
    public function getCallbacks(): array
    {
        return $this->callbacks;
    }

    /**
     * Add a callback.
     */
    public function addCallback(string $name, Channel|Reference $callback): self
    {
        $this->callbacks[$name] = $callback;
        return $this;
    }
}
