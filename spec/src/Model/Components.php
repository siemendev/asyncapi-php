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
    protected $schemas = [];

    /**
     * An object to hold reusable Tag Objects.
     *
     * @var array<string, Tag|Reference>
     */
    protected $tags = [];

    /**
     * An object to hold reusable External Documentation Objects.
     *
     * @var array<string, ExternalDocumentation|Reference>
     */
    protected $externalDocs = [];

    /**
     * An object to hold reusable Server Objects.
     *
     * @var array<string, Server|Reference>
     */
    protected $servers = [];

    /**
     * An object to hold reusable Channel Item Objects.
     *
     * @var array<string, Channel|Reference>
     */
    protected $channels = [];

    /**
     * An object to hold reusable Operation Objects.
     *
     * @var array<string, Operation|Reference>
     */
    protected $operations = [];

    /**
     * An object to hold reusable Message Objects.
     *
     * @var array<string, Message|Reference>
     */
    protected $messages = [];

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @var array<string, SecurityScheme|Reference>
     */
    protected $securitySchemes = [];

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @var array<string, Parameter|Reference>
     */
    protected $parameters = [];

    /**
     * An object to hold reusable Correlation ID Objects.
     *
     * @var array<string, CorrelationId|Reference>
     */
    protected $correlationIds = [];

    /**
     * An object to hold reusable Operation Trait Objects.
     *
     * @var array<string, OperationTrait|Reference>
     */
    protected $operationTraits = [];

    /**
     * An object to hold reusable Message Trait Objects.
     *
     * @var array<string, MessageTrait|Reference>
     */
    protected $messageTraits = [];

    /**
     * An object to hold reusable Server Variable Objects.
     *
     * @var array<string, ServerVariable|Reference>
     */
    protected $serverVariables = [];

    /**
     * An object to hold reusable Server Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected $serverBindings = [];

    /**
     * An object to hold reusable Channel Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected $channelBindings = [];

    /**
     * An object to hold reusable Operation Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected $operationBindings = [];

    /**
     * An object to hold reusable Message Bindings Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected $messageBindings = [];

    /**
     * An object to hold reusable Operation Reply Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected $replies = [];

    /**
     * An object to hold reusable Operation Reply Address Objects.
     *
     * @var array<string, mixed|Reference>
     */
    protected $replyAddresses = [];

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
     *
     * @param string $name The schema name
     * @param Schema|Reference $schema The schema
     * @return $this
     */
    public function addSchema(string $name, $schema): self
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
     *
     * @param string $name The server name
     * @param Server|Reference $server The server
     * @return $this
     */
    public function addServer(string $name, $server): self
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
     *
     * @param string $name The channel name
     * @param Channel|Reference $channel The channel
     * @return $this
     */
    public function addChannel(string $name, $channel): self
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
     *
     * @param string $name The operation name
     * @param Operation|Reference $operation The operation
     * @return $this
     */
    public function addOperation(string $name, $operation): self
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
     *
     * @param string $name The message name
     * @param Message|Reference $message The message
     * @return $this
     */
    public function addMessage(string $name, $message): self
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
     *
     * @param string $name The security scheme name
     * @param SecurityScheme|Reference $securityScheme The security scheme
     * @return $this
     */
    public function addSecurityScheme(string $name, $securityScheme): self
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
     *
     * @param string $name The parameter name
     * @param Parameter|Reference $parameter The parameter
     * @return $this
     */
    public function addParameter(string $name, $parameter): self
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
     *
     * @param string $name The operation trait name
     * @param OperationTrait|Reference $operationTrait The operation trait
     * @return $this
     */
    public function addOperationTrait(string $name, $operationTrait): self
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
     *
     * @param string $name The message trait name
     * @param MessageTrait|Reference $messageTrait The message trait
     * @return $this
     */
    public function addMessageTrait(string $name, $messageTrait): self
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
     *
     * @param string $name The server variable name
     * @param ServerVariable|Reference $serverVariable The server variable
     * @return $this
     */
    public function addServerVariable(string $name, $serverVariable): self
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
     *
     * @param string $name The tag name
     * @param Tag|Reference $tag The tag
     * @return $this
     */
    public function addTag(string $name, $tag): self
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
     *
     * @param string $name The external documentation name
     * @param ExternalDocumentation|Reference $externalDoc The external documentation
     * @return $this
     */
    public function addExternalDoc(string $name, $externalDoc): self
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
     *
     * @param string $name The server binding name
     * @param mixed|Reference $binding The server binding
     * @return $this
     */
    public function addServerBinding(string $name, $binding): self
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
     *
     * @param string $name The channel binding name
     * @param mixed|Reference $binding The channel binding
     * @return $this
     */
    public function addChannelBinding(string $name, $binding): self
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
     *
     * @param string $name The operation binding name
     * @param mixed|Reference $binding The operation binding
     * @return $this
     */
    public function addOperationBinding(string $name, $binding): self
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
     *
     * @param string $name The message binding name
     * @param mixed|Reference $binding The message binding
     * @return $this
     */
    public function addMessageBinding(string $name, $binding): self
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
     *
     * @param string $name The reply name
     * @param mixed|Reference $reply The reply
     * @return $this
     */
    public function addReply(string $name, $reply): self
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
     *
     * @param string $name The reply address name
     * @param mixed|Reference $replyAddress The reply address
     * @return $this
     */
    public function addReplyAddress(string $name, $replyAddress): self
    {
        $this->replyAddresses[$name] = $replyAddress;
        return $this;
    }
}
