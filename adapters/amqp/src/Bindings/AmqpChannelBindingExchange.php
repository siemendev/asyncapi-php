<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * AMQP Exchange Object.
 *
 * This object contains information about the exchange representation in AMQP.
 */
class AmqpChannelBindingExchange extends AsyncApiObject
{
    /** The name of the exchange. It MUST NOT exceed 255 characters long. */
    protected ?string $name = null;

    /** The type of the exchange. Can be either topic, direct, fanout, default or headers. */
    protected ?string $type = null;

    /** Whether the exchange should survive broker restarts or not. */
    protected ?bool $durable = null;

    /** Whether the exchange should be deleted when the last queue is unbound from it. */
    protected ?bool $autoDelete = null;

    /** The virtual host of the exchange. Defaults to /. */
    protected ?string $vhost = null;

    /**
     * Get the exchange name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the exchange name.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the exchange type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Set the exchange type.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get whether the exchange is durable.
     */
    public function getDurable(): ?bool
    {
        return $this->durable;
    }

    /**
     * Set whether the exchange is durable.
     */
    public function setDurable(?bool $durable): self
    {
        $this->durable = $durable;

        return $this;
    }

    /**
     * Get whether the exchange is auto-deleted.
     */
    public function getAutoDelete(): ?bool
    {
        return $this->autoDelete;
    }

    /**
     * Set whether the exchange is auto-deleted.
     */
    public function setAutoDelete(?bool $autoDelete): self
    {
        $this->autoDelete = $autoDelete;

        return $this;
    }

    /**
     * Get the virtual host of the exchange.
     */
    public function getVhost(): ?string
    {
        return $this->vhost;
    }

    /**
     * Set the virtual host of the exchange.
     */
    public function setVhost(?string $vhost): self
    {
        $this->vhost = $vhost;

        return $this;
    }
}
