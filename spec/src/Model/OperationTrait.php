<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes a trait that can be applied to an operation.
 */
class OperationTrait extends AsyncApiObject
{
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
     * A declaration of which security mechanisms can be used for this operation.
     *
     * @var array<SecurityRequirement>
     */
    protected $security = [];
    
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
     * The definition of the message that will be published or received by this operation.
     *
     * @var Message|Reference|null
     */
    protected $message;
    
    /**
     * The definition of the messages that will be published or received by this operation.
     *
     * @var array<Message|Reference>|null
     */
    protected $messages;
    
    /**
     * The definition of the reply message that will be sent back as a response to this operation.
     *
     * @var array<Message|Reference>|null
     */
    protected $reply;
    
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
     *
     * @param SecurityRequirement $security The security requirement
     * @return $this
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
     * @return $this
     */
    public function setReply(array $reply): self
    {
        $this->reply = $reply;
        return $this;
    }
}