<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Provides an example of a message.
 */
class MessageExample extends AsyncApiObject
{
    /**
     * A machine-friendly name for the example.
     */
    protected ?string $name = null;

    /**
     * A short summary of what the example is about.
     */
    protected ?string $summary = null;

    /**
     * A verbose explanation of the example.
     */
    protected ?string $description = null;

    /**
     * The value of the example.
     */
    protected mixed $value = null;

    /**
     * The value of the message headers.
     */
    protected mixed $headers = null;

    /**
     * Get the name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name.
     */
    public function setName(string $name): self
    {
        $this->name = $name;
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
     * Get the value.
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * Set the value.
     */
    public function setValue(mixed $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the headers.
     */
    public function getHeaders(): mixed
    {
        return $this->headers;
    }

    /**
     * Set the headers.
     */
    public function setHeaders(mixed $headers): self
    {
        $this->headers = $headers;
        return $this;
    }
}
