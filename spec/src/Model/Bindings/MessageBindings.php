<?php

namespace Siemendev\AsyncapiPhp\Spec\Model\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * Message Bindings Object
 * 
 * Map describing protocol-specific definitions for a message.
 * 
 * @see https://www.asyncapi.com/docs/reference/specification/latest#messageBindingsObject
 */
class MessageBindings extends AsyncApiObject
{
    /**
     * Protocol-specific information for an HTTP message, i.e., a request or a response.
     */
    protected ?MessageBinding $http = null;

    /**
     * Protocol-specific information for a WebSockets message.
     */
    protected ?MessageBinding $ws = null;

    /**
     * Protocol-specific information for a Kafka message.
     */
    protected ?MessageBinding $kafka = null;

    /**
     * Protocol-specific information for an Anypoint MQ message.
     */
    protected ?MessageBinding $anypointmq = null;

    /**
     * Protocol-specific information for an AMQP 0-9-1 message.
     */
    protected ?MessageBinding $amqp = null;

    /**
     * Protocol-specific information for an AMQP 1.0 message.
     */
    protected ?MessageBinding $amqp1 = null;

    /**
     * Protocol-specific information for an MQTT message.
     */
    protected ?MessageBinding $mqtt = null;

    /**
     * Protocol-specific information for an MQTT 5 message.
     */
    protected ?MessageBinding $mqtt5 = null;

    /**
     * Protocol-specific information for a NATS message.
     */
    protected ?MessageBinding $nats = null;

    /**
     * Protocol-specific information for a JMS message.
     */
    protected ?MessageBinding $jms = null;

    /**
     * Protocol-specific information for an SNS message.
     */
    protected ?MessageBinding $sns = null;

    /**
     * Protocol-specific information for a Solace message.
     */
    protected ?MessageBinding $solace = null;

    /**
     * Protocol-specific information for an SQS message.
     */
    protected ?MessageBinding $sqs = null;

    /**
     * Protocol-specific information for a STOMP message.
     */
    protected ?MessageBinding $stomp = null;

    /**
     * Protocol-specific information for a Redis message.
     */
    protected ?MessageBinding $redis = null;

    /**
     * Protocol-specific information for a Mercure message.
     */
    protected ?MessageBinding $mercure = null;

    /**
     * Protocol-specific information for an IBM MQ message.
     */
    protected ?MessageBinding $ibmmq = null;

    /**
     * Protocol-specific information for a Google Cloud Pub/Sub message.
     */
    protected ?MessageBinding $googlepubsub = null;

    /**
     * Protocol-specific information for a Pulsar message.
     */
    protected ?MessageBinding $pulsar = null;

    /**
     * Get HTTP message binding.
     */
    public function getHttp(): ?MessageBinding
    {
        return $this->http;
    }

    /**
     * Set HTTP message binding.
     */
    public function setHttp(?MessageBinding $http): self
    {
        $this->http = $http?->setParentElement($this);
        return $this;
    }

    /**
     * Get WebSockets message binding.
     */
    public function getWs(): ?MessageBinding
    {
        return $this->ws;
    }

    /**
     * Set WebSockets message binding.
     */
    public function setWs(?MessageBinding $ws): self
    {
        $this->ws = $ws?->setParentElement($this);
        return $this;
    }

    /**
     * Get Kafka message binding.
     */
    public function getKafka(): ?MessageBinding
    {
        return $this->kafka;
    }

    /**
     * Set Kafka message binding.
     */
    public function setKafka(?MessageBinding $kafka): self
    {
        $this->kafka = $kafka?->setParentElement($this);
        return $this;
    }

    /**
     * Get Anypoint MQ message binding.
     */
    public function getAnypointmq(): ?MessageBinding
    {
        return $this->anypointmq;
    }

    /**
     * Set Anypoint MQ message binding.
     */
    public function setAnypointmq(?MessageBinding $anypointmq): self
    {
        $this->anypointmq = $anypointmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP message binding.
     */
    public function getAmqp(): ?MessageBinding
    {
        return $this->amqp;
    }

    /**
     * Set AMQP message binding.
     */
    public function setAmqp(?MessageBinding $amqp): self
    {
        $this->amqp = $amqp?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP 1.0 message binding.
     */
    public function getAmqp1(): ?MessageBinding
    {
        return $this->amqp1;
    }

    /**
     * Set AMQP 1.0 message binding.
     */
    public function setAmqp1(?MessageBinding $amqp1): self
    {
        $this->amqp1 = $amqp1?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT message binding.
     */
    public function getMqtt(): ?MessageBinding
    {
        return $this->mqtt;
    }

    /**
     * Set MQTT message binding.
     */
    public function setMqtt(?MessageBinding $mqtt): self
    {
        $this->mqtt = $mqtt?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT 5 message binding.
     */
    public function getMqtt5(): ?MessageBinding
    {
        return $this->mqtt5;
    }

    /**
     * Set MQTT 5 message binding.
     */
    public function setMqtt5(?MessageBinding $mqtt5): self
    {
        $this->mqtt5 = $mqtt5?->setParentElement($this);
        return $this;
    }

    /**
     * Get NATS message binding.
     */
    public function getNats(): ?MessageBinding
    {
        return $this->nats;
    }

    /**
     * Set NATS message binding.
     */
    public function setNats(?MessageBinding $nats): self
    {
        $this->nats = $nats?->setParentElement($this);
        return $this;
    }

    /**
     * Get JMS message binding.
     */
    public function getJms(): ?MessageBinding
    {
        return $this->jms;
    }

    /**
     * Set JMS message binding.
     */
    public function setJms(?MessageBinding $jms): self
    {
        $this->jms = $jms?->setParentElement($this);
        return $this;
    }

    /**
     * Get SNS message binding.
     */
    public function getSns(): ?MessageBinding
    {
        return $this->sns;
    }

    /**
     * Set SNS message binding.
     */
    public function setSns(?MessageBinding $sns): self
    {
        $this->sns = $sns?->setParentElement($this);
        return $this;
    }

    /**
     * Get Solace message binding.
     */
    public function getSolace(): ?MessageBinding
    {
        return $this->solace;
    }

    /**
     * Set Solace message binding.
     */
    public function setSolace(?MessageBinding $solace): self
    {
        $this->solace = $solace?->setParentElement($this);
        return $this;
    }

    /**
     * Get SQS message binding.
     */
    public function getSqs(): ?MessageBinding
    {
        return $this->sqs;
    }

    /**
     * Set SQS message binding.
     */
    public function setSqs(?MessageBinding $sqs): self
    {
        $this->sqs = $sqs?->setParentElement($this);
        return $this;
    }

    /**
     * Get STOMP message binding.
     */
    public function getStomp(): ?MessageBinding
    {
        return $this->stomp;
    }

    /**
     * Set STOMP message binding.
     */
    public function setStomp(?MessageBinding $stomp): self
    {
        $this->stomp = $stomp?->setParentElement($this);
        return $this;
    }

    /**
     * Get Redis message binding.
     */
    public function getRedis(): ?MessageBinding
    {
        return $this->redis;
    }

    /**
     * Set Redis message binding.
     */
    public function setRedis(?MessageBinding $redis): self
    {
        $this->redis = $redis?->setParentElement($this);
        return $this;
    }

    /**
     * Get Mercure message binding.
     */
    public function getMercure(): ?MessageBinding
    {
        return $this->mercure;
    }

    /**
     * Set Mercure message binding.
     */
    public function setMercure(?MessageBinding $mercure): self
    {
        $this->mercure = $mercure?->setParentElement($this);
        return $this;
    }

    /**
     * Get IBM MQ message binding.
     */
    public function getIbmmq(): ?MessageBinding
    {
        return $this->ibmmq;
    }

    /**
     * Set IBM MQ message binding.
     */
    public function setIbmmq(?MessageBinding $ibmmq): self
    {
        $this->ibmmq = $ibmmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get Google Cloud Pub/Sub message binding.
     */
    public function getGooglepubsub(): ?MessageBinding
    {
        return $this->googlepubsub;
    }

    /**
     * Set Google Cloud Pub/Sub message binding.
     */
    public function setGooglepubsub(?MessageBinding $googlepubsub): self
    {
        $this->googlepubsub = $googlepubsub?->setParentElement($this);
        return $this;
    }

    /**
     * Get Pulsar message binding.
     */
    public function getPulsar(): ?MessageBinding
    {
        return $this->pulsar;
    }

    /**
     * Set Pulsar message binding.
     */
    public function setPulsar(?MessageBinding $pulsar): self
    {
        $this->pulsar = $pulsar?->setParentElement($this);
        return $this;
    }
}
