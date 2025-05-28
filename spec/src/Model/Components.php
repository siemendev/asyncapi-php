<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

use Siemendev\AsyncapiPhp\Spec\Model\Bindings\ChannelBindings;
use Siemendev\AsyncapiPhp\Spec\Model\Bindings\MessageBindings;
use Siemendev\AsyncapiPhp\Spec\Model\Bindings\OperationBindings;
use Siemendev\AsyncapiPhp\Spec\Model\Bindings\ServerBindings;

/**
 * Holds a set of reusable objects for different aspects of the AsyncAPI specification.
 */
class Components extends AsyncApiObject
{
    /**
     * An object to hold reusable Schema Objects.
     *
     * @var array<string, Schema|Reference<Schema>>
     */
    protected array $schemas = [];

    /**
     * An object to hold reusable Tag Objects.
     *
     * @var array<string, Tag|Reference<Tag>>
     */
    protected array $tags = [];

    /**
     * An object to hold reusable External Documentation Objects.
     *
     * @var array<string, ExternalDocumentation|Reference<ExternalDocumentation>>
     */
    protected array $externalDocs = [];

    /**
     * An object to hold reusable Server Objects.
     *
     * @var array<string, Server|Reference<Server>>
     */
    protected array $servers = [];

    /**
     * An object to hold reusable Channel Item Objects.
     *
     * @var array<string, Channel|Reference<Channel>>
     */
    protected array $channels = [];

    /**
     * An object to hold reusable Operation Objects.
     *
     * @var array<string, Operation|Reference<Operation>>
     */
    protected array $operations = [];

    /**
     * An object to hold reusable Message Objects.
     *
     * @var array<string, Message|Reference<Message>>
     */
    protected array $messages = [];

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @var array<string, SecurityScheme|Reference<SecurityScheme>>
     */
    protected array $securitySchemes = [];

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @var array<string, Parameter|Reference<Parameter>>
     */
    protected array $parameters = [];

    /**
     * An object to hold reusable Correlation ID Objects.
     *
     * @var array<string, CorrelationId|Reference<CorrelationId>>
     */
    protected array $correlationIds = [];

    /**
     * An object to hold reusable Operation Trait Objects.
     *
     * @var array<string, OperationTrait|Reference<OperationTrait>>
     */
    protected array $operationTraits = [];

    /**
     * An object to hold reusable Message Trait Objects.
     *
     * @var array<string, MessageTrait|Reference<MessageTrait>>
     */
    protected array $messageTraits = [];

    /**
     * An object to hold reusable Server Variable Objects.
     *
     * @var array<string, ServerVariable|Reference<ServerVariable>>
     */
    protected array $serverVariables = [];

    /**
     * An object to hold reusable Server Bindings Objects.
     *
     * @var ServerBindings|Reference<ServerBindings>|null
     */
    protected ServerBindings|Reference|null $serverBindings = null;

    /**
     * An object to hold reusable Channel Bindings Objects.
     *
     * @var ChannelBindings|Reference<ChannelBindings>|null
     */
    protected ChannelBindings|Reference|null $channelBindings = null;

    /**
     * An object to hold reusable Operation Bindings Objects.
     *
     * @var OperationBindings|Reference<OperationBindings>|null
     */
    protected OperationBindings|Reference|null $operationBindings = null;

    /**
     * An object to hold reusable Message Bindings Objects.
     *
     * @var MessageBindings|Reference<MessageBindings>|null
     */
    protected MessageBindings|Reference|null $messageBindings = null;

    /**
     * An object to hold reusable Operation Reply Objects.
     *
     * @var array<string, OperationReply|Reference<OperationReply>>
     */
    protected array $replies = [];

    /**
     * An object to hold reusable Operation Reply Address Objects.
     *
     * @var array<string, OperationReplyAddress|Reference<OperationReplyAddress>>
     */
    protected array $replyAddresses = [];

    /**
     * Get the schemas.
     *
     * @return array<string, Schema|Reference<Schema>>
     */
    public function getSchemas(): array
    {
        return $this->schemas;
    }

    /**
     * Add a schema.
     *
     * @param Schema|Reference<Schema> $schema
     */
    public function addSchema(string $name, Schema|Reference $schema): self
    {
        $this->schemas[$name] = $schema->setParentElement($this);

        return $this;
    }

    /**
     * Get the servers.
     *
     * @return array<string, Server|Reference<Server>>
     */
    public function getServers(): array
    {
        return $this->servers;
    }

    /**
     * Add a server.
     *
     * @param Server|Reference<Server> $server
     */
    public function addServer(string $name, Server|Reference $server): self
    {
        $this->servers[$name] = $server->setParentElement($this);

        return $this;
    }

    /**
     * Get the channels.
     *
     * @return array<string, Channel|Reference<Channel>>
     */
    public function getChannels(): array
    {
        return $this->channels;
    }

    /**
     * Add a channel.
     *
     * @param Channel|Reference<Channel> $channel
     */
    public function addChannel(string $name, Channel|Reference $channel): self
    {
        $this->channels[$name] = $channel->setParentElement($this);

        return $this;
    }

    /**
     * Get the operations.
     *
     * @return array<string, Operation|Reference<Operation>>
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * Add an operation.
     *
     * @param Operation|Reference<Operation> $operation
     */
    public function addOperation(string $name, Operation|Reference $operation): self
    {
        $this->operations[$name] = $operation->setParentElement($this);

        return $this;
    }

    /**
     * Get the messages.
     *
     * @return array<string, Message|Reference<Message>>
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * Add a message.
     *
     * @param Message|Reference<Message> $message
     */
    public function addMessage(string $name, Message|Reference $message): self
    {
        $this->messages[$name] = $message->setParentElement($this);

        return $this;
    }

    /**
     * Get the security schemes.
     *
     * @return array<string, SecurityScheme|Reference<SecurityScheme>>
     */
    public function getSecuritySchemes(): array
    {
        return $this->securitySchemes;
    }

    /**
     * Add a security scheme.
     *
     * @param SecurityScheme|Reference<SecurityScheme> $securityScheme
     */
    public function addSecurityScheme(string $name, SecurityScheme|Reference $securityScheme): self
    {
        $this->securitySchemes[$name] = $securityScheme->setParentElement($this);

        return $this;
    }

    /**
     * Get the parameters.
     *
     * @return array<string, Parameter|Reference<Parameter>>
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Add a parameter.
     *
     * @param Parameter|Reference<Parameter> $parameter
     */
    public function addParameter(string $name, Parameter|Reference $parameter): self
    {
        $this->parameters[$name] = $parameter->setParentElement($this);

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
     * Get the operation traits.
     *
     * @return array<string, OperationTrait|Reference<OperationTrait>>
     */
    public function getOperationTraits(): array
    {
        return $this->operationTraits;
    }

    /**
     * Add an operation trait.
     *
     * @param OperationTrait|Reference<OperationTrait> $operationTrait
     */
    public function addOperationTrait(string $name, OperationTrait|Reference $operationTrait): self
    {
        $this->operationTraits[$name] = $operationTrait->setParentElement($this);

        return $this;
    }

    /**
     * Get the message traits.
     *
     * @return array<string, MessageTrait|Reference<MessageTrait>>
     */
    public function getMessageTraits(): array
    {
        return $this->messageTraits;
    }

    /**
     * Add a message trait.
     *
     * @param MessageTrait|Reference<MessageTrait> $messageTrait
     */
    public function addMessageTrait(string $name, MessageTrait|Reference $messageTrait): self
    {
        $this->messageTraits[$name] = $messageTrait->setParentElement($this);

        return $this;
    }

    /**
     * Get the server variables.
     *
     * @return array<string, ServerVariable|Reference<ServerVariable>>
     */
    public function getServerVariables(): array
    {
        return $this->serverVariables;
    }

    /**
     * Add a server variable.
     *
     * @param ServerVariable|Reference<ServerVariable> $serverVariable
     */
    public function addServerVariable(string $name, ServerVariable|Reference $serverVariable): self
    {
        $this->serverVariables[$name] = $serverVariable->setParentElement($this);

        return $this;
    }

    /**
     * Get the tags.
     *
     * @return array<string, Tag|Reference<Tag>>
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * Add a tag.
     *
     * @param Tag|Reference<Tag> $tag
     */
    public function addTag(string $name, Tag|Reference $tag): self
    {
        $this->tags[$name] = $tag->setParentElement($this);

        return $this;
    }

    /**
     * Get the external documentation.
     *
     * @return array<string, ExternalDocumentation|Reference<ExternalDocumentation>>
     */
    public function getExternalDocs(): array
    {
        return $this->externalDocs;
    }

    /**
     * Add external documentation.
     *
     * @param ExternalDocumentation|Reference<ExternalDocumentation> $externalDoc
     */
    public function addExternalDoc(string $name, ExternalDocumentation|Reference $externalDoc): self
    {
        $this->externalDocs[$name] = $externalDoc->setParentElement($this);

        return $this;
    }

    /**
     * Get the server bindings.
     *
     * @return ServerBindings|Reference<ServerBindings>|null
     */
    public function getServerBindings(): ServerBindings|Reference|null
    {
        return $this->serverBindings;
    }

    /**
     * @param ServerBindings|Reference<ServerBindings>|null $bindings
     */
    public function setServerBindings(ServerBindings|Reference|null $bindings): self
    {
        $this->serverBindings = $bindings?->setParentElement($this);

        return $this;
    }

    /**
     * Get the channel bindings.
     *
     * @return ChannelBindings|Reference<ChannelBindings>|null
     */
    public function getChannelBindings(): ChannelBindings|Reference|null
    {
        return $this->channelBindings;
    }

    /**
     * @param ChannelBindings|Reference<ChannelBindings>|null $bindings
     */
    public function setChannelBindings(ChannelBindings|Reference|null $bindings): self
    {
        $this->channelBindings = $bindings?->setParentElement($this);

        return $this;
    }

    /**
     * Get the operation bindings.
     *
     * @return OperationBindings|Reference<OperationBindings>|null
     */
    public function getOperationBindings(): OperationBindings|Reference|null
    {
        return $this->operationBindings;
    }

    /**
     * @param OperationBindings|Reference<OperationBindings>|null $bindings
     */
    public function setOperationBindings(OperationBindings|Reference|null $bindings): self
    {
        $this->operationBindings = $bindings?->setParentElement($this);

        return $this;
    }

    /**
     * Get the message bindings.
     *
     * @return MessageBindings|Reference<MessageBindings>|null
     */
    public function getMessageBindings(): MessageBindings|Reference|null
    {
        return $this->messageBindings;
    }

    /**
     * @param MessageBindings|Reference<MessageBindings>|null $bindings
     */
    public function setMessageBindings(MessageBindings|Reference|null $bindings): self
    {
        $this->messageBindings = $bindings?->setParentElement($this);

        return $this;
    }

    /**
     * Get the replies.
     *
     * @return array<string, OperationReply|Reference<OperationReply>>
     */
    public function getReplies(): array
    {
        return $this->replies;
    }

    /**
     * Add a reply.
     *
     * @param OperationReply|Reference<OperationReply> $reply
     */
    public function addReply(string $name, OperationReply|Reference $reply): self
    {
        $this->replies[$name] = $reply->setParentElement($this);

        return $this;
    }

    /**
     * Get the reply addresses.
     *
     * @return array<string, OperationReplyAddress|Reference<OperationReplyAddress>>
     */
    public function getReplyAddresses(): array
    {
        return $this->replyAddresses;
    }

    /**
     * Add a reply address.
     *
     * @param OperationReplyAddress|Reference<OperationReplyAddress> $replyAddress
     */
    public function addReplyAddress(string $name, OperationReplyAddress|Reference $replyAddress): self
    {
        $this->replyAddresses[$name] = $replyAddress->setParentElement($this);

        return $this;
    }

    /**
     * Resolves the references to the schemas and returns an array of Schema objects.
     *
     * @return array<string, Schema>
     */
    public function resolveSchemas(): array
    {
        $schemas = [];
        foreach ($this->schemas as $name => $schemaRef) {
            if ($schemaRef instanceof Reference) {
                $schemas[$name] = $schemaRef->resolve();
            } else {
                $schemas[$name] = $schemaRef;
            }
        }

        return $schemas;
    }

    /**
     * Resolves the references to the tags and returns an array of Tag objects.
     *
     * @return array<string, Tag>
     */
    public function resolveTags(): array
    {
        $tags = [];
        foreach ($this->tags as $name => $tagRef) {
            if ($tagRef instanceof Reference) {
                $tags[$name] = $tagRef->resolve();
            } else {
                $tags[$name] = $tagRef;
            }
        }

        return $tags;
    }

    /**
     * Resolves the references to the external docs and returns an array of ExternalDocumentation objects.
     *
     * @return array<string, ExternalDocumentation>
     */
    public function resolveExternalDocs(): array
    {
        $externalDocs = [];
        foreach ($this->externalDocs as $name => $externalDocRef) {
            if ($externalDocRef instanceof Reference) {
                $externalDocs[$name] = $externalDocRef->resolve();
            } else {
                $externalDocs[$name] = $externalDocRef;
            }
        }

        return $externalDocs;
    }

    /**
     * Resolves the references to the servers and returns an array of Server objects.
     *
     * @return array<string, Server>
     */
    public function resolveServers(): array
    {
        $servers = [];
        foreach ($this->servers as $name => $serverRef) {
            if ($serverRef instanceof Reference) {
                $servers[$name] = $serverRef->resolve();
            } else {
                $servers[$name] = $serverRef;
            }
        }

        return $servers;
    }

    /**
     * Resolves the references to the channels and returns an array of Channel objects.
     *
     * @return array<string, Channel>
     */
    public function resolveChannels(): array
    {
        $channels = [];
        foreach ($this->channels as $name => $channelRef) {
            if ($channelRef instanceof Reference) {
                $channels[$name] = $channelRef->resolve();
            } else {
                $channels[$name] = $channelRef;
            }
        }

        return $channels;
    }

    /**
     * Resolves the references to the operations and returns an array of Operation objects.
     *
     * @return array<string, Operation>
     */
    public function resolveOperations(): array
    {
        $operations = [];
        foreach ($this->operations as $name => $operationRef) {
            if ($operationRef instanceof Reference) {
                $operations[$name] = $operationRef->resolve();
            } else {
                $operations[$name] = $operationRef;
            }
        }

        return $operations;
    }

    /**
     * Resolves the references to the messages and returns an array of Message objects.
     *
     * @return array<string, Message>
     */
    public function resolveMessages(): array
    {
        $messages = [];
        foreach ($this->messages as $name => $messageRef) {
            if ($messageRef instanceof Reference) {
                $messages[$name] = $messageRef->resolve();
            } else {
                $messages[$name] = $messageRef;
            }
        }

        return $messages;
    }

    /**
     * Resolves the references to the security schemes and returns an array of SecurityScheme objects.
     *
     * @return array<string, SecurityScheme>
     */
    public function resolveSecuritySchemes(): array
    {
        $securitySchemes = [];
        foreach ($this->securitySchemes as $name => $securitySchemeRef) {
            if ($securitySchemeRef instanceof Reference) {
                $securitySchemes[$name] = $securitySchemeRef->resolve();
            } else {
                $securitySchemes[$name] = $securitySchemeRef;
            }
        }

        return $securitySchemes;
    }

    /**
     * Resolves the references to the parameters and returns an array of Parameter objects.
     *
     * @return array<string, Parameter>
     */
    public function resolveParameters(): array
    {
        $parameters = [];
        foreach ($this->parameters as $name => $parameterRef) {
            if ($parameterRef instanceof Reference) {
                $parameters[$name] = $parameterRef->resolve();
            } else {
                $parameters[$name] = $parameterRef;
            }
        }

        return $parameters;
    }

    /**
     * Resolves the references to the correlation IDs and returns an array of CorrelationId objects.
     *
     * @return array<string, CorrelationId>
     */
    public function resolveCorrelationIds(): array
    {
        $correlationIds = [];
        foreach ($this->correlationIds as $name => $correlationIdRef) {
            if ($correlationIdRef instanceof Reference) {
                $correlationIds[$name] = $correlationIdRef->resolve();
            } else {
                $correlationIds[$name] = $correlationIdRef;
            }
        }

        return $correlationIds;
    }

    /**
     * Resolves the references to the operation traits and returns an array of OperationTrait objects.
     *
     * @return array<string, OperationTrait>
     */
    public function resolveOperationTraits(): array
    {
        $operationTraits = [];
        foreach ($this->operationTraits as $name => $operationTraitRef) {
            if ($operationTraitRef instanceof Reference) {
                $operationTraits[$name] = $operationTraitRef->resolve();
            } else {
                $operationTraits[$name] = $operationTraitRef;
            }
        }

        return $operationTraits;
    }

    /**
     * Resolves the references to the message traits and returns an array of MessageTrait objects.
     *
     * @return array<string, MessageTrait>
     */
    public function resolveMessageTraits(): array
    {
        $messageTraits = [];
        foreach ($this->messageTraits as $name => $messageTraitRef) {
            if ($messageTraitRef instanceof Reference) {
                $messageTraits[$name] = $messageTraitRef->resolve();
            } else {
                $messageTraits[$name] = $messageTraitRef;
            }
        }

        return $messageTraits;
    }

    /**
     * Resolves the references to the server variables and returns an array of ServerVariable objects.
     *
     * @return array<string, ServerVariable>
     */
    public function resolveServerVariables(): array
    {
        $serverVariables = [];
        foreach ($this->serverVariables as $name => $serverVariableRef) {
            if ($serverVariableRef instanceof Reference) {
                $serverVariables[$name] = $serverVariableRef->resolve();
            } else {
                $serverVariables[$name] = $serverVariableRef;
            }
        }

        return $serverVariables;
    }

    /**
     * Resolves the references to the server bindings.
     */
    public function resolveServerBindings(): ?ServerBindings
    {
        if ($this->serverBindings instanceof Reference) {
            return $this->serverBindings->resolve();
        }

        return $this->serverBindings;
    }

    /**
     * Resolves the references to the channel bindings.
     */
    public function resolveChannelBindings(): ?ChannelBindings
    {
        if ($this->channelBindings instanceof Reference) {
            return $this->channelBindings->resolve();
        }

        return $this->channelBindings;
    }

    /**
     * Resolves the references to the operation bindings.
     */
    public function resolveOperationBindings(): ?OperationBindings
    {
        if ($this->operationBindings instanceof Reference) {
            return $this->operationBindings->resolve();
        }

        return $this->operationBindings;
    }

    /**
     * Resolves the references to the message bindings.
     */
    public function resolveMessageBindings(): ?MessageBindings
    {
        if ($this->messageBindings instanceof Reference) {
            return $this->messageBindings->resolve();
        }

        return $this->messageBindings;
    }

    /**
     * Resolves the references to the replies.
     *
     * @return array<string, OperationReply>
     */
    public function resolveReplies(): array
    {
        $replies = [];
        foreach ($this->replies as $name => $replyRef) {
            if ($replyRef instanceof Reference) {
                $replies[$name] = $replyRef->resolve();
            } else {
                $replies[$name] = $replyRef;
            }
        }

        return $replies;
    }

    /**
     * Resolves the references to the reply addresses.
     *
     * @return array<string, OperationReplyAddress>
     */
    public function resolveReplyAddresses(): array
    {
        $replyAddresses = [];
        foreach ($this->replyAddresses as $name => $replyAddressRef) {
            if ($replyAddressRef instanceof Reference) {
                $replyAddresses[$name] = $replyAddressRef->resolve();
            } else {
                $replyAddresses[$name] = $replyAddressRef;
            }
        }

        return $replyAddresses;
    }
}
