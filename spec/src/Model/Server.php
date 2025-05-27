<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

use Siemendev\AsyncapiPhp\Spec\Model\Bindings\ServerBindings;

/**
 * An object representing a server.
 */
class Server extends AsyncApiObject
{
    /**
     * A host (name or IP) of the server.
     */
    protected string $host;

    /**
     * The protocol this server supports for connection.
     */
    protected string $protocol;

    /**
     * The version of the protocol used for connection.
     */
    protected ?string $protocolVersion = null;

    /**
     * The path to a resource in the host.
     */
    protected ?string $pathname = null;

    /**
     * A short description of the server.
     */
    protected ?string $description = null;

    /**
     * A human-friendly title for the server.
     */
    protected ?string $title = null;

    /**
     * A short summary of the server.
     */
    protected ?string $summary = null;

    /**
     * A map between a variable name and its value.
     * The value is used for substitution in the server's host template.
     *
     * @var array<string, ServerVariable>
     */
    protected array $variables = [];

    /**
     * A declaration of which security mechanisms can be used with this server.
     *
     * @var array<SecurityScheme>
     */
    protected array $security = [];

    /**
     * A list of tags for logical grouping and categorization of servers.
     *
     * @var array<Tag>
     */
    protected array $tags = [];

    /**
     * Additional external documentation for this server.
     */
    protected ?ExternalDocumentation $externalDocs = null;

    /**
     * A map of the bindings for this server.
     *
     * @var ServerBindings|Reference<ServerBindings>
     */
    protected ServerBindings|Reference $bindings;

    /**
     * Constructor.
     *
     * @param string $host The host (name or IP) of the server
     * @param string $protocol The protocol this server supports for connection
     */
    public function __construct(string $host, string $protocol)
    {
        $this->host = $host;
        $this->protocol = $protocol;
    }

    /**
     * Get the host.
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Get the protocol.
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * Get the protocol version.
     */
    public function getProtocolVersion(): ?string
    {
        return $this->protocolVersion;
    }

    /**
     * Set the protocol version.
     */
    public function setProtocolVersion(string $protocolVersion): self
    {
        $this->protocolVersion = $protocolVersion;
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
     * Get the variables.
     *
     * @return array<string, ServerVariable>
     */
    public function getVariables(): array
    {
        return $this->variables;
    }

    /**
     * Add a variable.
     */
    public function addVariable(string $name, ServerVariable $variable): self
    {
        $this->variables[$name] = $variable->setParentElement($this);
        return $this;
    }

    /**
     * Get the security scheme.
     *
     * @return array<SecurityScheme>
     */
    public function getSecurity(): array
    {
        return $this->security;
    }

    /**
     * Add a security scheme.
     */
    public function addSecurity(SecurityScheme $security): self
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
     * Get the pathname.
     */
    public function getPathname(): ?string
    {
        return $this->pathname;
    }

    /**
     * Set the pathname.
     */
    public function setPathname(string $pathname): self
    {
        $this->pathname = $pathname;
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
     * Get the bindings.
     *
     * @return ServerBindings|Reference<ServerBindings>
     */
    public function getBindings(): ServerBindings|Reference
    {
        return $this->bindings;
    }

    /**
     * Set the bindings.
     *
     * @param ServerBindings|Reference<ServerBindings> $bindings
     */
    public function setBindings(ServerBindings|Reference $bindings): self
    {
        $this->bindings = $bindings->setParentElement($this);
        return $this;
    }

    /**
     * Resolves the reference to the bindings and returns a ServerBindings object.
     */
    public function resolveBindings(): ServerBindings
    {
        if ($this->bindings instanceof Reference) {
            return $this->bindings->resolve();
        }
        return $this->bindings;
    }
}
