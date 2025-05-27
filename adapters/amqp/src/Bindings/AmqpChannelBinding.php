<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\Bindings\ChannelBinding;

/**
 * AMQP Channel Binding Object
 * 
 * This object contains information about the channel representation in AMQP.
 * 
 * @see https://github.com/asyncapi/bindings/blob/master/amqp/README.md#channel-binding-object
 */
class AmqpChannelBinding extends ChannelBinding
{
    public const TYPE_QUEUE = 'queue';
    public const TYPE_ROUTING_KEY = 'routingKey';

    /**
     * Defines what type of channel it is. Can be either AmqpChannelBinding::TYPE_QUEUE or AmqpChannelBinding::TYPE_ROUTING_KEY.
     */
    protected ?string $is = null;

    /**
     * When `is`=`routingKey`, this object defines the exchange properties.
     */
    protected ?AmqpChannelBindingExchange $exchange = null;

    /**
     * When `is`=`queue`, this object defines the queue properties.
     */
    protected ?AmqpChannelBindingQueue $queue = null;

    /**
     * Get the channel type.
     */
    public function getIs(): ?string
    {
        return $this->is;
    }

    /**
     * Set the channel type.
     */
    public function setIs(?string $is): self
    {
        $this->is = $is;
        return $this;
    }

    /**
     * Get the exchange properties.
     */
    public function getExchange(): ?AmqpChannelBindingExchange
    {
        return $this->exchange;
    }

    /**
     * Set the exchange properties.
     * 
     * @param AmqpChannelBindingExchange|null $exchange Exchange properties object
     */
    public function setExchange(?AmqpChannelBindingExchange $exchange): self
    {
        $this->exchange = $exchange;
        return $this;
    }

    /**
     * Get the queue properties.
     */
    public function getQueue(): ?AmqpChannelBindingQueue
    {
        return $this->queue;
    }

    /**
     * Set the queue properties.
     * 
     * @param AmqpChannelBindingQueue|null $queue Queue properties object
     */
    public function setQueue(?AmqpChannelBindingQueue $queue): self
    {
        $this->queue = $queue;
        return $this;
    }
}
