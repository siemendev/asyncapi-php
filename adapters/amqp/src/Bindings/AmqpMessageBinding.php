<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * AMQP Message Binding Object
 * 
 * This object contains information about the message representation in AMQP.
 * 
 * @see https://github.com/asyncapi/bindings/blob/master/amqp/README.md#message-binding-object
 */
class AmqpMessageBinding extends AsyncApiObject
{
    /**
     * A MIME encoding for the message content.
     */
    protected ?string $contentEncoding = null;

    /**
     * Application-specific message type.
     */
    protected ?string $messageType = null;

    /**
     * The version of this binding. If omitted, "latest" MUST be assumed.
     */
    protected ?string $bindingVersion = null;

    /**
     * Get the content encoding.
     */
    public function getContentEncoding(): ?string
    {
        return $this->contentEncoding;
    }

    /**
     * Set the content encoding.
     */
    public function setContentEncoding(?string $contentEncoding): self
    {
        $this->contentEncoding = $contentEncoding;
        return $this;
    }

    /**
     * Get the message type.
     */
    public function getMessageType(): ?string
    {
        return $this->messageType;
    }

    /**
     * Set the message type.
     */
    public function setMessageType(?string $messageType): self
    {
        $this->messageType = $messageType;
        return $this;
    }

    /**
     * Get the binding version.
     */
    public function getBindingVersion(): ?string
    {
        return $this->bindingVersion;
    }

    /**
     * Set the binding version.
     */
    public function setBindingVersion(?string $bindingVersion): self
    {
        $this->bindingVersion = $bindingVersion;
        return $this;
    }
}
