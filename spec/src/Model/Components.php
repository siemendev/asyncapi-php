<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Holds a set of reusable objects for different aspects of the AsyncAPI specification.
 */
class Components extends AsyncApiObject
{
    /**
     * An object to hold reusable Schema Objects.
     *
     * @var array<string, Schema|Reference>
     */
    protected array $schemas = [];

    /**
     * An object to hold reusable Tag Objects.
     *
     * @var array<string, Tag|Reference>
     */
    protected array $tags = [];

    /**
     * An object to hold reusable External Documentation Objects.
     *
     * @var array<string, ExternalDocumentation|Reference>
     */
    protected array $externalDocs = [];

    /**
     * An object to hold reusable Server Objects.
     *
     * @var array<string, Server|Reference>
     */
    protected array $servers = [];

    /**
     * An object to hold reusable Channel Item Objects.
     *
     * @var array<string, Channel|Reference>
     */
    protected array $channels = [];

    /**
     * An object to hold reusable Operation Objects.
     *
     * @var array<string, Operation|Reference>
     */
    protected array $operations = [];

    /**
     * An object to hold reusable Message Objects.
     *
     * @var array<string, Message|Reference>
     */
    protected array $messages = [];

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @var array<string, SecurityScheme|Reference>
     */
    protected array $securitySchemes = [];

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @var array<string, Parameter|Reference>
     */
    protected array $parameters = [];

    /**
     * An object to hold reusable Correlation ID Objects.
     *
     * @var array<string, CorrelationId|Reference>
     */
    protected array $correlationIds = [];

    /**
     * An object to hold reusable Operation Trait Objects.
     *
     * @var array<string, OperationTrait|Reference>
     */
    protected array $operationTraits = [];

    /**
     * An object to hold reusable Message Trait Objects.
     *
     * @var array<string, MessageTrait|Reference>
     */
    protected array $messageTraits = [];

    /**
     * An object to hold reusable Server Variable Objects.
     *
     * @var array<string, ServerVariable|Reference>
     */
    protected array $serverVariables = [];

    /**
     * An object to hold reusable Server Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected array $serverBindings = [];

    /**
     * An object to hold reusable Channel Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected array $channelBindings = [];

    /**
     * An object to hold reusable Operation Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected array $operationBindings = [];

    /**
     * An object to hold reusable Message Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected array $messageBindings = [];

    /**
     * An object to hold reusable Operation Reply Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected array $replies = [];

    /**
     * An object to hold reusable Operation Reply Address Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected array $replyAddresses = [];

    /**
     * Get the schemas.
     *
     * @return array<string, Schema|Reference>
     */
    public function getSchemas(): array
    {
        return $this->schemas;
    }

    /**
     * Add a schema.
     */
    public function addSchema(string $name, Schema|Reference $schema): self
    {
        $this->schemas[$name] = $schema;
        return $this;
    }

    /**
     * Get the servers.
     *
     * @return array<string, Server|Reference>
     */
    public function getServers(): array
    {
        return $this->servers;
    }

    /**
     * Add a server.
     */
    public function addServer(string $name, Server|Reference $server): self
    {
        $this->servers[$name] = $server;
        return $this;
    }

    /**
     * Get the channels.
     *
     * @return array<string, Channel|Reference>
     */
    public function getChannels(): array
    {
        return $this->channels;
    }

    /**
     * Add a channel.
     */
    public function addChannel(string $name, Channel|Reference $channel): self
    {
        $this->channels[$name] = $channel;
        return $this;
    }

    /**
     * Get the operations.
     *
     * @return array<string, Operation|Reference>
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * Add an operation.
     */
    public function addOperation(string $name, Operation|Reference $operation): self
    {
        $this->operations[$name] = $operation;
        return $this;
    }

    /**
     * Get the messages.
     *
     * @return array<string, Message|Reference>
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * Add a message.
     */
    public function addMessage(string $name, Message|Reference $message): self
    {
        $this->messages[$name] = $message;
        return $this;
    }

    /**
     * Get the security schemes.
     *
     * @return array<string, SecurityScheme|Reference>
     */
    public function getSecuritySchemes(): array
    {
        return $this->securitySchemes;
    }

    /**
     * Add a security scheme.
     */
    public function addSecurityScheme(string $name, SecurityScheme|Reference $securityScheme): self
    {
        $this->securitySchemes[$name] = $securityScheme;
        return $this;
    }

    /**
     * Get the parameters.
     *
     * @return array<string, Parameter|Reference>
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Add a parameter.
     */
    public function addParameter(string $name, Parameter|Reference $parameter): self
    {
        $this->parameters[$name] = $parameter;
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

    /**
     * Get the operation traits.
     *
     * @return array<string, OperationTrait|Reference>
     */
    public function getOperationTraits(): array
    {
        return $this->operationTraits;
    }

    /**
     * Add an operation trait.
     */
    public function addOperationTrait(string $name, OperationTrait|Reference $operationTrait): self
    {
        $this->operationTraits[$name] = $operationTrait;
        return $this;
    }

    /**
     * Get the message traits.
     *
     * @return array<string, MessageTrait|Reference>
     */
    public function getMessageTraits(): array
    {
        return $this->messageTraits;
    }

    /**
     * Add a message trait.
     */
    public function addMessageTrait(string $name, MessageTrait|Reference $messageTrait): self
    {
        $this->messageTraits[$name] = $messageTrait;
        return $this;
    }

    /**
     * Get the server variables.
     *
     * @return array<string, ServerVariable|Reference>
     */
    public function getServerVariables(): array
    {
        return $this->serverVariables;
    }

    /**
     * Add a server variable.
     */
    public function addServerVariable(string $name, ServerVariable|Reference $serverVariable): self
    {
        $this->serverVariables[$name] = $serverVariable;
        return $this;
    }

    /**
     * Get the tags.
     *
     * @return array<string, Tag|Reference>
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * Add a tag.
     */
    public function addTag(string $name, Tag|Reference $tag): self
    {
        $this->tags[$name] = $tag;
        return $this;
    }

    /**
     * Get the external documentation.
     *
     * @return array<string, ExternalDocumentation|Reference>
     */
    public function getExternalDocs(): array
    {
        return $this->externalDocs;
    }

    /**
     * Add external documentation.
     */
    public function addExternalDoc(string $name, ExternalDocumentation|Reference $externalDoc): self
    {
        $this->externalDocs[$name] = $externalDoc;
        return $this;
    }

    /**
     * Get the server bindings.
     *
     * @return array<string, mixed|Reference>
     */
    public function getServerBindings(): array
    {
        return $this->serverBindings;
    }

    /**
     * Add a server binding.
     */
    public function addServerBinding(string $name, mixed $binding): self
    {
        $this->serverBindings[$name] = $binding;
        return $this;
    }

    /**
     * Get the channel bindings.
     *
     * @return array<string, mixed|Reference>
     */
    public function getChannelBindings(): array
    {
        return $this->channelBindings;
    }

    /**
     * Add a channel binding.
     */
    public function addChannelBinding(string $name, mixed $binding): self
    {
        $this->channelBindings[$name] = $binding;
        return $this;
    }

    /**
     * Get the operation bindings.
     *
     * @return array<string, mixed|Reference>
     */
    public function getOperationBindings(): array
    {
        return $this->operationBindings;
    }

    /**
     * Add an operation binding.
     */
    public function addOperationBinding(string $name, mixed $binding): self
    {
        $this->operationBindings[$name] = $binding;
        return $this;
    }

    /**
     * Get the message bindings.
     *
     * @return array<string, mixed|Reference>
     */
    public function getMessageBindings(): array
    {
        return $this->messageBindings;
    }

    /**
     * Add a message binding.
     */
    public function addMessageBinding(string $name, mixed $binding): self
    {
        $this->messageBindings[$name] = $binding;
        return $this;
    }

    /**
     * Get the replies.
     *
     * @return array<string, mixed|Reference>
     */
    public function getReplies(): array
    {
        return $this->replies;
    }

    /**
     * Add a reply.
     */
    public function addReply(string $name, mixed $reply): self
    {
        $this->replies[$name] = $reply;
        return $this;
    }

    /**
     * Get the reply addresses.
     *
     * @return array<string, mixed|Reference>
     */
    public function getReplyAddresses(): array
    {
        return $this->replyAddresses;
    }

    /**
     * Add a reply address.
     */
    public function addReplyAddress(string $name, mixed $replyAddress): self
    {
        $this->replyAddresses[$name] = $replyAddress;
        return $this;
    }
}
