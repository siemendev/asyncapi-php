<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * An object representing a server variable for server URL template substitution.
 */
class ServerVariable extends AsyncApiObject
{
    /**
     * An enumeration of string values to be used if the substitution options are from a limited set.
     *
     * @var array<string>|null
     */
    protected ?array $enum = null;

    /**
     * The default value to use for substitution, which SHALL be sent if an alternate value is not supplied.
     */
    protected string $default;

    /**
     * A description for the server variable.
     */
    protected ?string $description = null;

    /**
     * An array of examples of the server variable.
     *
     * @var array<string>|null
     */
    protected ?array $examples = null;

    /**
     * Constructor.
     *
     * @param string $default The default value to use for substitution
     */
    public function __construct(string $default)
    {
        $this->default = $default;
    }

    /**
     * Get the enum values.
     *
     * @return array<string>|null
     */
    public function getEnum(): ?array
    {
        return $this->enum;
    }

    /**
     * Set the enum values.
     *
     * @param array<string> $enum The enum values
     */
    public function setEnum(array $enum): self
    {
        $this->enum = $enum;
        return $this;
    }

    /**
     * Get the default value.
     */
    public function getDefault(): string
    {
        return $this->default;
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
     * Get the examples.
     *
     * @return array<string>|null
     */
    public function getExamples(): ?array
    {
        return $this->examples;
    }

    /**
     * Set the examples.
     *
     * @param array<string> $examples The examples
     */
    public function setExamples(array $examples): self
    {
        $this->examples = $examples;
        return $this;
    }
}
