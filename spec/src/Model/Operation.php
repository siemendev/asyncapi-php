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
     *
     * @var string
     */
    protected $action;

    /**
     * Required. A $ref pointer to the definition of the channel in which this operation is performed.
     *
     * @var Reference
     */
    protected $channel;

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
     * A declaration of which security schemes are associated with this operation.
     * Only one of the security scheme objects MUST be satisfied to authorize an operation.
     *
     * @var array<SecurityScheme|Reference>
     */
    protected $security = [];

    /**
     * A list of tags for logical grouping and categorization of operations.
     *
     * @var array<Tag>
     */
    protected $tags = [];

    /**
     * Additional external documentation for this operation.
     *
     * @var ExternalDocumentation|Reference|null
     */
    protected $externalDocs;

    /**
     * A map where the keys describe the name of the protocol and the values describe protocol-specific definitions for the operation.
     *
     * @var array<string, mixed>|Reference
     */
    protected $bindings = [];

    /**
     * A list of traits to apply to the operation object.
     *
     * @var array<OperationTrait|Reference>
     */
    protected $traits = [];

    /**
     * The definition of the message that will be published or received by this operation.
     *
     * @var Message|Reference|null
     */
    protected $message;

    /**
     * A list of $ref pointers pointing to the supported Message Objects that can be processed by this operation.
     *
     * @var array<Reference>|null
     */
    protected $messages;

    /**
     * The definition of the reply in a request-reply operation.
     *
     * @var mixed|Reference|null
     */
    protected $reply;

    /**
     * A map of possible out-of-band callbacks related to the parent operation.
     *
     * @var array<string, Channel|Reference>
     */
    protected $callbacks = [];

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
     * Get the action.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * Set the action.
     *
     * @param string $action The action ("send" or "receive")
     * @return $this
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get the channel.
     *
     * @return Reference|null
     */
    public function getChannel(): ?Reference
    {
        return $this->channel;
    }

    /**
     * Set the channel.
     *
     * @param Reference $channel The channel reference
     * @return $this
     */
    public function setChannel(Reference $channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * Get the security requirements.
     *
     * @return array<SecurityScheme|Reference>
     */
    public function getSecurity(): array
    {
        return $this->security;
    }

    /**
     * Add a security requirement.
     *
     * @param SecurityScheme|Reference $security The security scheme or reference
     * @return $this
     */
    public function addSecurity($security): self
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
     * @return ExternalDocumentation|Reference|null
     */
    public function getExternalDocs()
    {
        return $this->externalDocs;
    }

    /**
     * Set the external documentation.
     *
     * @param ExternalDocumentation|Reference $externalDocs The external documentation or reference
     * @return $this
     */
    public function setExternalDocs($externalDocs): self
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }

    /**
     * Get the bindings.
     *
     * @return array<string, mixed>|Reference
     */
    public function getBindings()
    {
        return $this->bindings;
    }

    /**
     * Set the bindings.
     *
     * @param array<string, mixed>|Reference $bindings The bindings or reference
     * @return $this
     */
    public function setBindings($bindings): self
    {
        $this->bindings = $bindings;
        return $this;
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
        if (!is_array($this->bindings)) {
            $this->bindings = [];
        }
        $this->bindings[$name] = $binding;
        return $this;
    }

    /**
     * Get the traits.
     *
     * @return array<OperationTrait|Reference>
     */
    public function getTraits(): array
    {
        return $this->traits;
    }

    /**
     * Add a trait.
     *
     * @param OperationTrait|Reference $trait The trait
     * @return $this
     */
    public function addTrait($trait): self
    {
        $this->traits[] = $trait;
        return $this;
    }

    /**
     * Get the message.
     *
     * @return Message|Reference|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the message.
     *
     * @param Message|Reference $message The message
     * @return $this
     */
    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the messages.
     *
     * @return array<Reference>|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * Set the messages.
     *
     * @param array<Reference> $messages The messages references
     * @return $this
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Add a message reference.
     *
     * @param Reference $message The message reference
     * @return $this
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
     *
     * @return mixed|Reference|null
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set the reply.
     *
     * @param mixed|Reference $reply The reply or reference
     * @return $this
     */
    public function setReply($reply): self
    {
        $this->reply = $reply;
        return $this;
    }

    /**
     * Get the callbacks.
     *
     * @return array<string, Channel|Reference>
     */
    public function getCallbacks(): array
    {
        return $this->callbacks;
    }

    /**
     * Add a callback.
     *
     * @param string $name The callback name
     * @param Channel|Reference $callback The callback
     * @return $this
     */
    public function addCallback(string $name, $callback): self
    {
        $this->callbacks[$name] = $callback;
        return $this;
    }
}
