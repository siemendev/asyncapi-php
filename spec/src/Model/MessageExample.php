<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Provides an example of a message.
 */
class MessageExample extends AsyncApiObject
{
    /**
     * A machine-friendly name for the example.
     *
     * @var string|null
     */
    protected $name;
    
    /**
     * A short summary of what the example is about.
     *
     * @var string|null
     */
    protected $summary;
    
    /**
     * A verbose explanation of the example.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * The value of the example.
     *
     * @var mixed
     */
    protected $value;
    
    /**
     * The value of the message headers.
     *
     * @var mixed
     */
    protected $headers;
    
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
     *
     * @param string $name The name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
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
     * Get the value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Set the value.
     *
     * @param mixed $value The value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }
    
    /**
     * Get the headers.
     *
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    
    /**
     * Set the headers.
     *
     * @param mixed $headers The headers
     * @return $this
     */
    public function setHeaders($headers): self
    {
        $this->headers = $headers;
        return $this;
    }
}