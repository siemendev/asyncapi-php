<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;

/**
 * Represents the root AsyncAPI document.
 *
 * This is the main class that represents an AsyncAPI document.
 * It contains all the information about the API, including metadata,
 * servers, channels, operations, and components.
 */
class AsyncApi extends AsyncApiObject
{
    /** The AsyncAPI specification version. */
    protected string $asyncapi = '3.0.0';

    /** Identifier of the application the AsyncAPI document is defining. */
    protected ?string $id = null;

    /** General information about the API. */
    protected Info $info;

    /**
     * Servers object to be used by the application.
     *
     * @var array<string, Server|Reference<Server>>
     */
    protected array $servers = [];

    /** Default content type to use when encoding/decoding a message's payload. */
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

    /** An element to hold various schemas for the specification. */
    protected ?Components $components = null;

    /**
     * Constructor.
     */
    public function __construct(Info $info)
    {
        $this->info = $info->setParentElement($this);
    }

    /**
     * @param array<mixed> $data
     * @throws InvalidSpecificationException
     */
    public static function createFromArray(array $data): AsyncApi
    {
        /** @var array<string, mixed> $data */
        if (!isset($data['info']) || !is_array($data['info'])) {
            throw new InvalidSpecificationException('Missing or malformed required "info" field in AsyncAPI specification');
        }

        if (!isset($data['info']['title']) || !is_scalar($data['info']['title'])) {
            throw new InvalidSpecificationException('Missing required "title" field in AsyncAPI info');
        }

        if (!isset($data['info']['version']) || !is_scalar($data['info']['version'])) {
            throw new InvalidSpecificationException('Missing required "version" field in AsyncAPI info');
        }

        return (new self(new Info((string) $data['info']['title'], (string) $data['info']['version'])))->populateFromArray($data);
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
     * @throws InvalidSpecificationException
     */
    public function getOperation(string $operationName): Operation
    {
        return $this->operations[$operationName] ?? throw new InvalidSpecificationException('Operation not found: ' . $operationName);
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

    /**
     * Process servers data.
     *
     * @param array<mixed> $serversData
     */
    public function processServers(array $serversData): void
    {
        foreach ($serversData as $name => $serverData) {
            if (!is_array($serverData)) {
                continue;
            }
            if (!isset($serverData['host']) || !is_scalar($serverData['host'])) {
                continue;
            }
            if (!isset($serverData['protocol']) || !is_scalar($serverData['protocol'])) {
                continue;
            }

            $server = new Server((string) $serverData['host'], (string) $serverData['protocol']);
            $server->populateFromArray($serverData);
            $this->addServer((string) $name, $server);
        }
    }

    /**
     * Process channels data.
     *
     * @param array<mixed> $channelsData
     */
    public function processChannels(array $channelsData): void
    {
        foreach ($channelsData as $name => $channelData) {
            if (!is_array($channelData)) {
                continue;
            }
            $channel = new Channel();
            $channel->populateFromArray($channelData);
            $this->addChannel($name, $channel);
        }
    }

    /**
     * Process operations data.
     *
     * @param array<mixed> $operationsData
     */
    public function processOperations(array $operationsData): void
    {
        foreach ($operationsData as $name => $operationData) {
            if (!is_array($operationData)) {
                continue;
            }
            $operation = new Operation();
            $operation->populateFromArray($operationData);
            $this->addOperation($name, $operation);
        }
    }
}
