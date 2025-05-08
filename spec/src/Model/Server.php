<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * An object representing a server.
 */
class Server extends AsyncApiObject
{
    /**
     * A host (name or IP) of the server.
     *
     * @var string
     */
    protected $host;

    /**
     * The protocol this server supports for connection.
     *
     * @var string
     */
    protected $protocol;

    /**
     * The version of the protocol used for connection.
     *
     * @var string|null
     */
    protected $protocolVersion;

    /**
     * The path to a resource in the host.
     *
     * @var string|null
     */
    protected $pathname;

    /**
     * A short description of the server.
     *
     * @var string|null
     */
    protected $description;

    /**
     * A human-friendly title for the server.
     *
     * @var string|null
     */
    protected $title;

    /**
     * A short summary of the server.
     *
     * @var string|null
     */
    protected $summary;

    /**
     * A map between a variable name and its value.
     * The value is used for substitution in the server's host template.
     *
     * @var array<string, ServerVariable>
     */
    protected $variables = [];

    /**
     * A declaration of which security mechanisms can be used with this server.
     *
     * @var array<SecurityScheme>
     */
    protected $security = [];

    /**
     * A list of tags for logical grouping and categorization of servers.
     *
     * @var array<Tag>
     */
    protected $tags = [];

    /**
     * Additional external documentation for this server.
     *
     * @var ExternalDocumentation|null
     */
    protected $externalDocs;

    /**
     * A map of the bindings for this server.
     *
     * @var array<string, mixed>
     */
    protected $bindings = [];

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
     *
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Get the protocol.
     *
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * Get the protocol version.
     *
     * @return string|null
     */
    public function getProtocolVersion(): ?string
    {
        return $this->protocolVersion;
    }

    /**
     * Set the protocol version.
     *
     * @param string $protocolVersion The protocol version
     * @return $this
     */
    public function setProtocolVersion(string $protocolVersion): self
    {
        $this->protocolVersion = $protocolVersion;
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
     *
     * @param string $name The variable name
     * @param ServerVariable $variable The variable
     * @return $this
     */
    public function addVariable(string $name, ServerVariable $variable): self
    {
        $this->variables[$name] = $variable;
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
     *
     * @param SecurityScheme $security The security scheme
     * @return $this
     */
    public function addSecurity(SecurityScheme $security): self
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
     * Get the pathname.
     *
     * @return string|null
     */
    public function getPathname(): ?string
    {
        return $this->pathname;
    }

    /**
     * Set the pathname.
     *
     * @param string $pathname The pathname
     * @return $this
     */
    public function setPathname(string $pathname): self
    {
        $this->pathname = $pathname;
        return $this;
    }

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
}
