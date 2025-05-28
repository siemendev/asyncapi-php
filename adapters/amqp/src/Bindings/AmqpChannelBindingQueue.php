<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * AMQP Queue Object.
 *
 * This object contains information about the queue representation in AMQP.
 */
class AmqpChannelBindingQueue extends AsyncApiObject
{
    /** The name of the queue. It MUST NOT exceed 255 characters long. */
    protected ?string $name = null;

    /** Whether the queue should survive broker restarts or not. */
    protected ?bool $durable = null;

    /** Whether the queue should be used only by one connection or not. */
    protected ?bool $exclusive = null;

    /** Whether the queue should be deleted when the last consumer unsubscribes. */
    protected ?bool $autoDelete = null;

    /** The virtual host of the queue. Defaults to /. */
    protected ?string $vhost = null;

    /**
     * Get the queue name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the queue name.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get whether the queue is durable.
     */
    public function getDurable(): ?bool
    {
        return $this->durable;
    }

    /**
     * Set whether the queue is durable.
     */
    public function setDurable(?bool $durable): self
    {
        $this->durable = $durable;

        return $this;
    }

    /**
     * Get whether the queue is exclusive.
     */
    public function getExclusive(): ?bool
    {
        return $this->exclusive;
    }

    /**
     * Set whether the queue is exclusive.
     */
    public function setExclusive(?bool $exclusive): self
    {
        $this->exclusive = $exclusive;

        return $this;
    }

    /**
     * Get whether the queue is auto-deleted.
     */
    public function getAutoDelete(): ?bool
    {
        return $this->autoDelete;
    }

    /**
     * Set whether the queue is auto-deleted.
     */
    public function setAutoDelete(?bool $autoDelete): self
    {
        $this->autoDelete = $autoDelete;

        return $this;
    }

    /**
     * Get the virtual host of the queue.
     */
    public function getVhost(): ?string
    {
        return $this->vhost;
    }

    /**
     * Set the virtual host of the queue.
     */
    public function setVhost(?string $vhost): self
    {
        $this->vhost = $vhost;

        return $this;
    }
}
