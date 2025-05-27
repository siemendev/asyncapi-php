<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Represents the root AsyncAPI document.
 * 
 * This is the main class that represents an AsyncAPI document.
 * It contains all the information about the API, including metadata,
 * servers, channels, operations, and components.
 */
class AsyncApi extends AsyncApiObject
{
    /**
     * The AsyncAPI specification version.
     */
    protected string $asyncapi = '3.0.0';

    /**
     * Identifier of the application the AsyncAPI document is defining.
     */
    protected ?string $id = null;

    /**
     * General information about the API.
     */
    protected Info $info;

    /**
     * Servers object to be used by the application.
     *
     * @var array<string, Server>
     */
    protected array $servers = [];

    /**
     * Default content type to use when encoding/decoding a message's payload.
     */
    protected ?string $defaultContentType = null;

    /**
     * The available channels and operations for the API.
     *
     * @var array<string, Channel>
     */
    protected array $channels = [];

    /**
     * The available operations for the API.
     *
     * @var array<string, Operation>
     */
    protected array $operations = [];

    /**
     * An element to hold various schemas for the specification.
     */
    protected ?Components $components = null;

    /**
     * Constructor.
     */
    public function __construct(Info $info)
    {
        $this->info = $info->setParentElement($this);
    }

    /**
     * Set the AsyncAPI specification version.
     */
    public function setAsyncapi(string $asyncapi): self
    {
        $this->asyncapi = $asyncapi;
        return $this;
    }

    /**
     * Get the AsyncAPI specification version.
     */
    public function getAsyncapi(): string
    {
        return $this->asyncapi;
    }

    /**
     * Get the identifier of the application.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set the identifier of the application.
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the general information about the API.
     */
    public function setInfo(Info $info): self
    {
        $this->info = $info->setParentElement($this);
        return $this;
    }

    /**
     * Get the general information about the API.
     */
    public function getInfo(): Info
    {
        return $this->info;
    }

    /**
     * Set the servers.
     *
     * @param array<string, Server> $servers
     */
    public function setServers(array $servers): self
    {
        foreach ($servers as $server) {
            $server->setParentElement($this);
        }
        $this->servers = $servers;
        return $this;
    }

    /**
     * Get the servers.
     *
     * @return array<string, Server>
     */
    public function getServers(): array
    {
        return $this->servers;
    }

    /**
     * Add a server.
     */
    public function addServer(string $name, Server $server): self
    {
        $this->servers[$name] = $server->setParentElement($this);
        return $this;
    }

    /**
     * Get the default content type.
     */
    public function getDefaultContentType(): ?string
    {
        return $this->defaultContentType;
    }

    /**
     * Set the default content type.
     */
    public function setDefaultContentType(string $defaultContentType): self
    {
        $this->defaultContentType = $defaultContentType;
        return $this;
    }

    /**
     * Set the channels.
     *
     * @param array<string, Channel> $channels
     */
    public function setChannels(array $channels): self
    {
        foreach ($channels as $channel) {
            $channel->setParentElement($this);
        }
        $this->channels = $channels;
        return $this;
    }

    /**
     * Get the channels.
     *
     * @return array<string, Channel>
     */
    public function getChannels(): array
    {
        return $this->channels;
    }

    /**
     * Add a channel.
     */
    public function addChannel(string $name, Channel $channel): self
    {
        $this->channels[$name] = $channel->setParentElement($this);
        return $this;
    }

    /**
     * Set the operations.
     *
     * @param array<string, Operation> $operations
     */
    public function setOperations(array $operations): self
    {
        foreach ($operations as $operation) {
            $operation->setParentElement($this);
        }
        $this->operations = $operations;
        return $this;
    }

    /**
     * Get the operations.
     *
     * @return array<string, Operation>
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * Add an operation.
     */
    public function addOperation(string $name, Operation $operation): self
    {
        $this->operations[$name] = $operation->setParentElement($this);
        return $this;
    }

    /**
     * Get the components.
     */
    public function getComponents(): ?Components
    {
        return $this->components;
    }

    /**
     * Set the components.
     */
    public function setComponents(Components $components): self
    {
        $this->components = $components->setParentElement($this);
        return $this;
    }
}
