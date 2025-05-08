<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * AMQP Operation Binding Object
 * 
 * This object contains information about the operation representation in AMQP.
 * 
 * @see https://github.com/asyncapi/bindings/blob/master/amqp/README.md#operation-binding-object
 */
class AmqpOperationBinding extends AsyncApiObject
{
    /**
     * TTL (Time-To-Live) for the message. It MUST be greater than or equal to zero.
     * Applies to actions: receive, send
     */
    protected ?int $expiration = null;

    /**
     * Identifies the user who has sent the message.
     * Applies to actions: receive, send
     */
    protected ?string $userId = null;

    /**
     * The routing keys the message should be routed to at the time of publishing.
     * Applies to actions: receive, send
     */
    protected ?array $cc = null;

    /**
     * A priority for the message.
     * Applies to actions: receive, send
     */
    protected ?int $priority = null;

    /**
     * Delivery mode of the message. Its value MUST be either 1 (transient) or 2 (persistent).
     * Applies to actions: receive, send
     */
    protected ?int $deliveryMode = null;

    /**
     * Whether the message is mandatory or not.
     * Applies to actions: receive
     */
    protected ?bool $mandatory = null;

    /**
     * Like cc but consumers will not receive this information.
     * Applies to actions: receive
     */
    protected ?array $bcc = null;

    /**
     * Whether the message should include a timestamp or not.
     * Applies to actions: receive, send
     */
    protected ?bool $timestamp = null;

    /**
     * Whether the consumer should ack the message or not.
     * Applies to actions: subscribe
     */
    protected ?bool $ack = null;

    /**
     * The version of this binding. If omitted, "latest" MUST be assumed.
     * Applies to actions: receive, send
     */
    protected ?string $bindingVersion = null;

    /**
     * Get the message expiration (TTL).
     */
    public function getExpiration(): ?int
    {
        return $this->expiration;
    }

    /**
     * Set the message expiration (TTL).
     * Must be greater than or equal to zero.
     */
    public function setExpiration(?int $expiration): self
    {
        $this->expiration = $expiration;
        return $this;
    }

    /**
     * Get the user ID.
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * Set the user ID.
     */
    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Get the routing keys (cc).
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    /**
     * Set the routing keys (cc).
     */
    public function setCc(?array $cc): self
    {
        $this->cc = $cc;
        return $this;
    }

    /**
     * Get the message priority.
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * Set the message priority.
     */
    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Get the delivery mode.
     */
    public function getDeliveryMode(): ?int
    {
        return $this->deliveryMode;
    }

    /**
     * Set the delivery mode.
     * Must be either 1 (transient) or 2 (persistent).
     */
    public function setDeliveryMode(?int $deliveryMode): self
    {
        $this->deliveryMode = $deliveryMode;
        return $this;
    }

    /**
     * Get whether the message is mandatory.
     */
    public function getMandatory(): ?bool
    {
        return $this->mandatory;
    }

    /**
     * Set whether the message is mandatory.
     */
    public function setMandatory(?bool $mandatory): self
    {
        $this->mandatory = $mandatory;
        return $this;
    }

    /**
     * Get the blind carbon copy routing keys (bcc).
     */
    public function getBcc(): ?array
    {
        return $this->bcc;
    }

    /**
     * Set the blind carbon copy routing keys (bcc).
     */
    public function setBcc(?array $bcc): self
    {
        $this->bcc = $bcc;
        return $this;
    }

    /**
     * Get whether the message should include a timestamp.
     */
    public function getTimestamp(): ?bool
    {
        return $this->timestamp;
    }

    /**
     * Set whether the message should include a timestamp.
     */
    public function setTimestamp(?bool $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Get whether the consumer should ack the message.
     */
    public function getAck(): ?bool
    {
        return $this->ack;
    }

    /**
     * Set whether the consumer should ack the message.
     */
    public function setAck(?bool $ack): self
    {
        $this->ack = $ack;
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
