<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Exception\ReferenceNotFoundException;
use Siemendev\AsyncapiPhp\Spec\Model\Bindings\ChannelBindings;

/**
 * Describes a named network address where messages can be exchanged.
 */
class Channel extends AsyncApiObject
{
    /**
     * An optional string representation of this channel's address.
     * The address is typically the "topic name", "routing key", "event type", or "path".
     * When null or absent, it MUST be interpreted as unknown.
     */
    protected ?string $address = null;

    /** A human-friendly title for the channel. */
    protected ?string $title = null;

    /** A short summary of what the channel is about. */
    protected ?string $summary = null;

    /** A description of the channel. */
    protected ?string $description = null;

    /**
     * A map of the operations available on the channel.
     *
     * @var array<string, ChannelOperation>
     */
    protected array $operations = [];

    /**
     * A map of the parameters included in the channel address.
     *
     * @var array<string, Parameter>
     */
    protected array $parameters = [];

    /**
     * A list of tags for API documentation control.
     *
     * @var array<Tag>
     */
    protected array $tags = [];

    /** Additional external documentation for this channel. */
    protected ?ExternalDocumentation $externalDocs = null;

    /**
     * A map of the bindings for this channel.
     *
     * @var ChannelBindings|Reference<ChannelBindings>
     */
    protected ChannelBindings|Reference $bindings;

    /**
     * A map of the messages that will be published or received on this channel.
     *
     * @var array<string, Message|Reference<Message>>
     */
    protected array $messages = [];

    /**
     * An array of $ref pointers to the definition of the servers in which this channel is available.
     * If servers is absent or empty, this channel MUST be available on all the servers defined in the Servers Object.
     *
     * @var array<Reference<Server>>
     */
    protected array $servers = [];

    /**
     * Get the address.
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Set the address.
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

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
     * Get the operations.
     *
     * @return array<string, ChannelOperation>
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * Add an operation.
     */
    public function addOperation(string $operationId, ChannelOperation $operation): self
    {
        $this->operations[$operationId] = $operation->setParentElement($this);

        return $this;
    }

    /**
     * Get the parameters.
     *
     * @return array<string, Parameter>
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Add a parameter.
     */
    public function addParameter(string $name, Parameter $parameter): self
    {
        $this->parameters[$name] = $parameter->setParentElement($this);

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
     * @return ChannelBindings|Reference<ChannelBindings>
     */
    public function getBindings(): ChannelBindings|Reference
    {
        return $this->bindings;
    }

    /**
     * Set the bindings.
     *
     * @param ChannelBindings|Reference<ChannelBindings> $bindings
     */
    public function setBindings(ChannelBindings|Reference $bindings): self
    {
        $this->bindings = $bindings->setParentElement($this);

        return $this;
    }

    public function resolveBindings(): ChannelBindings
    {
        if ($this->bindings instanceof Reference) {
            return $this->bindings->resolve();
        }

        return $this->bindings;
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
     * Resolves the references to the messages and returns an array of Message objects.
     *
     * @return array<string, Message>
     */
    public function resolveMessages(): array
    {
        $resolvedMessages = [];
        foreach ($this->messages as $name => $messageRef) {
            if ($messageRef instanceof Message) {
                $resolvedMessages[$name] = $messageRef;
                continue;
            }
            $resolvedMessages[$name] = $messageRef->resolve();
        }

        return $resolvedMessages;
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
     * Get the servers.
     *
     * @return array<Reference<Server>>
     */
    public function getServers(): array
    {
        return $this->servers;
    }

    /**
     * Resolves the references to the servers and returns an array of Server objects.
     *
     * @return array<Server>
     */
    public function resolveServers(): array
    {
        $servers = [];
        foreach ($this->servers as $serverRef) {
            $servers[] = $serverRef->resolve();
        }

        return $servers;
    }

    /**
     * Add a server.
     *
     * @param Reference<Server> $server
     */
    public function addServer(Reference $server): self
    {
        $this->servers[] = $server->setParentElement($this);

        return $this;
    }

    /**
     * @throws InvalidSpecificationException
     * @throws ReferenceNotFoundException
     */
    public function resolveServer(?string $name = null): Server
    {
        foreach ($this->getServers() as $serverRef) {
            $parts = explode('/', $serverRef->getRef());
            $serverSpecs[end($parts)] = $serverRef->resolve();
        }
        if (empty($serverSpecs)) {
            $serverSpecs = $this->getRootElement()->resolveServers();
        }

        $serverSpec = $serverSpecs[$name] ?? null;
        if ($serverSpec instanceof Server) {
            return $serverSpec;
        }

        throw new InvalidSpecificationException(sprintf('Server "%s" not found for channel "%s"', $name, $this->getTitle() ?? '<no title>')); // todo change this to be more helpful
    }

    /**
     * @throws InvalidSpecificationException
     */
    public function getDefaultServerName(): string
    {
        if (empty($this->getServers())) {
            $name = array_key_first($this->getRootElement()->resolveServers());
            if (!$name) {
                throw new InvalidSpecificationException('No servers defined'); // todo change this to be more helpful
            }

            return $name;
        }

        $serverRefs = $this->getServers();
        $serverRef = $serverRefs[array_rand(array_keys($serverRefs))];
        $parts = explode('/', $serverRef->getRef());

        return end($parts);
    }
}
