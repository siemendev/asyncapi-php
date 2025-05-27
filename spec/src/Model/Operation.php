<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

use Siemendev\AsyncapiPhp\Spec\Model\Bindings\OperationBindings;

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
     *
     * @var Reference<Channel>
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
     *
     * @var array<SecurityScheme|Reference<SecurityScheme>>
     */
    protected array $security = [];

    /**
     * A list of tags for logical grouping and categorization of operations.
     *
     * @var array<Tag>
     */
    protected array $tags = [];

    /**
     * Additional external documentation for this operation.
     *
     * @var ExternalDocumentation|Reference<ExternalDocumentation>|null
     */
    protected ExternalDocumentation|Reference|null $externalDocs = null;

    /**
     * A map where the keys describe the name of the protocol and the values describe protocol-specific definitions for the operation.
     *
     * @var OperationBindings|Reference<OperationBindings>
     */
    protected OperationBindings|Reference $bindings;

    /**
     * A list of traits to apply to the operation object.
     *
     * @var array<OperationTrait|Reference<OperationTrait>>
     */
    protected array $traits = [];

    /**
     * A list of $ref pointers pointing to the supported Message Objects that can be processed by this operation.
     *
     * @var array<Reference<Message>>
     */
    protected array $messages = [];

    /**
     * The definition of the reply in a request-reply operation.
     *
     * @var OperationReply|Reference<OperationReply>|null
     */
    protected OperationReply|Reference|null $reply = null;

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
     *
     * @return Reference<Channel>
     */
    public function getChannel(): Reference
    {
        return $this->channel;
    }

    /**
     * Set the channel.
     *
     * @param Reference<Channel> $channel
     */
    public function setChannel(Reference $channel): self
    {
        $this->channel = $channel->setParentElement($this);
        return $this;
    }

    /**
     * Get the security requirements.
     *
     * @return array<SecurityScheme|Reference<SecurityScheme>>
     */
    public function getSecurity(): array
    {
        return $this->security;
    }

    /**
     * Add a security requirement.
     *
     * @param SecurityScheme|Reference<SecurityScheme> $security
     */
    public function addSecurity(SecurityScheme|Reference $security): self
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
     *
     * @return ExternalDocumentation|Reference<ExternalDocumentation>|null
     */
    public function getExternalDocs(): ExternalDocumentation|Reference|null
    {
        return $this->externalDocs;
    }

    /**
     * Set the external documentation.
     *
     * @param ExternalDocumentation|Reference<ExternalDocumentation> $externalDocs
     */
    public function setExternalDocs(ExternalDocumentation|Reference $externalDocs): self
    {
        $this->externalDocs = $externalDocs->setParentElement($this);
        return $this;
    }

    /**
     * Get the bindings.
     *
     * @return OperationBindings|Reference<OperationBindings>
     */
    public function getBindings(): OperationBindings|Reference
    {
        return $this->bindings;
    }

    /**
     * Set the bindings.
     *
     * @param OperationBindings|Reference<OperationBindings> $bindings
     */
    public function setBindings(OperationBindings|Reference $bindings): self
    {
        $this->bindings = $bindings->setParentElement($this);
        return $this;
    }

    /**
     * Get the traits.
     *
     * @return array<OperationTrait|Reference<OperationTrait>>
     */
    public function getTraits(): array
    {
        return $this->traits;
    }

    /**
     * Add a trait.
     *
     * @param OperationTrait|Reference<OperationTrait> $trait
     */
    public function addTrait(OperationTrait|Reference $trait): self
    {
        $this->traits[] = $trait->setParentElement($this);
        return $this;
    }

    /**
     * Get the messages.
     *
     * @return array<Reference<Message>>
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * Set the messages.
     *
     * @param array<Reference<Message>> $messages
     */
    public function setMessages(array $messages): self
    {
        foreach ($messages as $message) {
            $message->setParentElement($this);
        }
        $this->messages = $messages;
        return $this;
    }

    /**
     * Add a message reference.
     *
     * @param Reference<Message> $message
     */
    public function addMessage(Reference $message): self
    {
        $this->messages[] = $message->setParentElement($this);
        return $this;
    }

    /**
     * Get the reply.
     *
     * @return OperationReply|Reference<OperationReply>|null
     */
    public function getReply(): OperationReply|Reference|null
    {
        return $this->reply;
    }

    /**
     * Set the reply.
     *
     * @param OperationReply|Reference<OperationReply>|null $reply The reply or reference
     */
    public function setReply(OperationReply|Reference|null $reply): self
    {
        if ($reply instanceof AsyncApiObject) {
            $reply->setParentElement($this);
        }
        $this->reply = $reply;
        return $this;
    }

    /**
     * Resolves the reference to the channel and returns a Channel object.
     */
    public function resolveChannel(): Channel
    {
        return $this->channel->resolve();
    }

    /**
     * Resolves the reference to the external documentation and returns an ExternalDocumentation object.
     */
    public function resolveExternalDocs(): ?ExternalDocumentation
    {
        if ($this->externalDocs instanceof Reference) {
            return $this->externalDocs->resolve();
        }
        return $this->externalDocs;
    }

    /**
     * Resolves the reference to the bindings and returns an OperationBindings object.
     */
    public function resolveBindings(): OperationBindings
    {
        if ($this->bindings instanceof Reference) {
            return $this->bindings->resolve();
        }
        return $this->bindings;
    }

    /**
     * Resolves the references to the messages and returns an array of Message objects.
     *
     * @return array<Message>
     */
    public function resolveMessages(): array
    {
        $messages = [];
        foreach ($this->messages as $messageRef) {
            $messages[] = $messageRef->resolve();
        }
        return $messages;
    }

    /**
     * Resolves the reference to the reply and returns the resolved object.
     *
     * @return OperationReply|null
     */
    public function resolveReply(): ?OperationReply
    {
        if ($this->reply instanceof Reference) {
            return $this->reply->resolve();
        }
        return $this->reply;
    }

    /**
     * Resolves the references to the traits and returns an array of OperationTrait objects.
     *
     * @return array<OperationTrait>
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
     * Resolves the references to the security schemes and returns an array of SecurityScheme objects.
     *
     * @return array<SecurityScheme>
     */
    public function resolveSecurity(): array
    {
        $security = [];
        foreach ($this->security as $securityScheme) {
            if ($securityScheme instanceof Reference) {
                $security[] = $securityScheme->resolve();
            } else {
                $security[] = $securityScheme;
            }
        }
        return $security;
    }
}
