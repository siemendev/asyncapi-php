<?php

namespace Siemendev\AsyncapiPhp\Spec\Model\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * Channel Bindings Object
 * 
 * Map describing protocol-specific definitions for a channel.
 * 
 * @see https://www.asyncapi.com/docs/reference/specification/latest#channelBindingsObject
 */
class ChannelBindings extends AsyncApiObject
{
    /**
     * Protocol-specific information for an HTTP channel.
     */
    protected ?ChannelBinding $http = null;

    /**
     * Protocol-specific information for a WebSockets channel.
     */
    protected ?ChannelBinding $ws = null;

    /**
     * Protocol-specific information for a Kafka channel.
     */
    protected ?ChannelBinding $kafka = null;

    /**
     * Protocol-specific information for an Anypoint MQ channel.
     */
    protected ?ChannelBinding $anypointmq = null;

    /**
     * Protocol-specific information for an AMQP 0-9-1 channel.
     */
    protected ?ChannelBinding $amqp = null;

    /**
     * Protocol-specific information for an AMQP 1.0 channel.
     */
    protected ?ChannelBinding $amqp1 = null;

    /**
     * Protocol-specific information for an MQTT channel.
     */
    protected ?ChannelBinding $mqtt = null;

    /**
     * Protocol-specific information for an MQTT 5 channel.
     */
    protected ?ChannelBinding $mqtt5 = null;

    /**
     * Protocol-specific information for a NATS channel.
     */
    protected ?ChannelBinding $nats = null;

    /**
     * Protocol-specific information for a JMS channel.
     */
    protected ?ChannelBinding $jms = null;

    /**
     * Protocol-specific information for an SNS channel.
     */
    protected ?ChannelBinding $sns = null;

    /**
     * Protocol-specific information for a Solace channel.
     */
    protected ?ChannelBinding $solace = null;

    /**
     * Protocol-specific information for an SQS channel.
     */
    protected ?ChannelBinding $sqs = null;

    /**
     * Protocol-specific information for a STOMP channel.
     */
    protected ?ChannelBinding $stomp = null;

    /**
     * Protocol-specific information for a Redis channel.
     */
    protected ?ChannelBinding $redis = null;

    /**
     * Protocol-specific information for a Mercure channel.
     */
    protected ?ChannelBinding $mercure = null;

    /**
     * Protocol-specific information for an IBM MQ channel.
     */
    protected ?ChannelBinding $ibmmq = null;

    /**
     * Protocol-specific information for a Google Cloud Pub/Sub channel.
     */
    protected ?ChannelBinding $googlepubsub = null;

    /**
     * Protocol-specific information for a Pulsar channel.
     */
    protected ?ChannelBinding $pulsar = null;

    /**
     * Get HTTP channel binding.
     */
    public function getHttp(): ?ChannelBinding
    {
        return $this->http;
    }

    /**
     * Set HTTP channel binding.
     */
    public function setHttp(?ChannelBinding $http): self
    {
        $this->http = $http?->setParentElement($this);
        return $this;
    }

    /**
     * Get WebSockets channel binding.
     */
    public function getWs(): ?ChannelBinding
    {
        return $this->ws;
    }

    /**
     * Set WebSockets channel binding.
     */
    public function setWs(?ChannelBinding $ws): self
    {
        $this->ws = $ws?->setParentElement($this);
        return $this;
    }

    /**
     * Get Kafka channel binding.
     */
    public function getKafka(): ?ChannelBinding
    {
        return $this->kafka;
    }

    /**
     * Set Kafka channel binding.
     */
    public function setKafka(?ChannelBinding $kafka): self
    {
        $this->kafka = $kafka?->setParentElement($this);
        return $this;
    }

    /**
     * Get Anypoint MQ channel binding.
     */
    public function getAnypointmq(): ?ChannelBinding
    {
        return $this->anypointmq;
    }

    /**
     * Set Anypoint MQ channel binding.
     */
    public function setAnypointmq(?ChannelBinding $anypointmq): self
    {
        $this->anypointmq = $anypointmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP channel binding.
     */
    public function getAmqp(): ?ChannelBinding
    {
        return $this->amqp;
    }

    /**
     * Set AMQP channel binding.
     */
    public function setAmqp(?ChannelBinding $amqp): self
    {
        $this->amqp = $amqp?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP 1.0 channel binding.
     */
    public function getAmqp1(): ?ChannelBinding
    {
        return $this->amqp1;
    }

    /**
     * Set AMQP 1.0 channel binding.
     */
    public function setAmqp1(?ChannelBinding $amqp1): self
    {
        $this->amqp1 = $amqp1?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT channel binding.
     */
    public function getMqtt(): ?ChannelBinding
    {
        return $this->mqtt;
    }

    /**
     * Set MQTT channel binding.
     */
    public function setMqtt(?ChannelBinding $mqtt): self
    {
        $this->mqtt = $mqtt?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT 5 channel binding.
     */
    public function getMqtt5(): ?ChannelBinding
    {
        return $this->mqtt5;
    }

    /**
     * Set MQTT 5 channel binding.
     */
    public function setMqtt5(?ChannelBinding $mqtt5): self
    {
        $this->mqtt5 = $mqtt5?->setParentElement($this);
        return $this;
    }

    /**
     * Get NATS channel binding.
     */
    public function getNats(): ?ChannelBinding
    {
        return $this->nats;
    }

    /**
     * Set NATS channel binding.
     */
    public function setNats(?ChannelBinding $nats): self
    {
        $this->nats = $nats?->setParentElement($this);
        return $this;
    }

    /**
     * Get JMS channel binding.
     */
    public function getJms(): ?ChannelBinding
    {
        return $this->jms;
    }

    /**
     * Set JMS channel binding.
     */
    public function setJms(?ChannelBinding $jms): self
    {
        $this->jms = $jms?->setParentElement($this);
        return $this;
    }

    /**
     * Get SNS channel binding.
     */
    public function getSns(): ?ChannelBinding
    {
        return $this->sns;
    }

    /**
     * Set SNS channel binding.
     */
    public function setSns(?ChannelBinding $sns): self
    {
        $this->sns = $sns?->setParentElement($this);
        return $this;
    }

    /**
     * Get Solace channel binding.
     */
    public function getSolace(): ?ChannelBinding
    {
        return $this->solace;
    }

    /**
     * Set Solace channel binding.
     */
    public function setSolace(?ChannelBinding $solace): self
    {
        $this->solace = $solace?->setParentElement($this);
        return $this;
    }

    /**
     * Get SQS channel binding.
     */
    public function getSqs(): ?ChannelBinding
    {
        return $this->sqs;
    }

    /**
     * Set SQS channel binding.
     */
    public function setSqs(?ChannelBinding $sqs): self
    {
        $this->sqs = $sqs?->setParentElement($this);
        return $this;
    }

    /**
     * Get STOMP channel binding.
     */
    public function getStomp(): ?ChannelBinding
    {
        return $this->stomp;
    }

    /**
     * Set STOMP channel binding.
     */
    public function setStomp(?ChannelBinding $stomp): self
    {
        $this->stomp = $stomp?->setParentElement($this);
        return $this;
    }

    /**
     * Get Redis channel binding.
     */
    public function getRedis(): ?ChannelBinding
    {
        return $this->redis;
    }

    /**
     * Set Redis channel binding.
     */
    public function setRedis(?ChannelBinding $redis): self
    {
        $this->redis = $redis?->setParentElement($this);
        return $this;
    }

    /**
     * Get Mercure channel binding.
     */
    public function getMercure(): ?ChannelBinding
    {
        return $this->mercure;
    }

    /**
     * Set Mercure channel binding.
     */
    public function setMercure(?ChannelBinding $mercure): self
    {
        $this->mercure = $mercure?->setParentElement($this);
        return $this;
    }

    /**
     * Get IBM MQ channel binding.
     */
    public function getIbmmq(): ?ChannelBinding
    {
        return $this->ibmmq;
    }

    /**
     * Set IBM MQ channel binding.
     */
    public function setIbmmq(?ChannelBinding $ibmmq): self
    {
        $this->ibmmq = $ibmmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get Google Cloud Pub/Sub channel binding.
     */
    public function getGooglepubsub(): ?ChannelBinding
    {
        return $this->googlepubsub;
    }

    /**
     * Set Google Cloud Pub/Sub channel binding.
     */
    public function setGooglepubsub(?ChannelBinding $googlepubsub): self
    {
        $this->googlepubsub = $googlepubsub?->setParentElement($this);
        return $this;
    }

    /**
     * Get Pulsar channel binding.
     */
    public function getPulsar(): ?ChannelBinding
    {
        return $this->pulsar;
    }

    /**
     * Set Pulsar channel binding.
     */
    public function setPulsar(?ChannelBinding $pulsar): self
    {
        $this->pulsar = $pulsar?->setParentElement($this);
        return $this;
    }
}
