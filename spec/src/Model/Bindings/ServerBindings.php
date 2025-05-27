<?php

namespace Siemendev\AsyncapiPhp\Spec\Model\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * Server Bindings Object
 * 
 * Map describing protocol-specific definitions for a server.
 * 
 * @see https://www.asyncapi.com/docs/reference/specification/latest#serverBindingsObject
 */
class ServerBindings extends AsyncApiObject
{
    /**
     * Protocol-specific information for an HTTP server.
     */
    protected ?ServerBinding $http = null;

    /**
     * Protocol-specific information for a WebSockets server.
     */
    protected ?ServerBinding $ws = null;

    /**
     * Protocol-specific information for a Kafka server.
     */
    protected ?ServerBinding $kafka = null;

    /**
     * Protocol-specific information for an Anypoint MQ server.
     */
    protected ?ServerBinding $anypointmq = null;

    /**
     * Protocol-specific information for an AMQP 0-9-1 server.
     */
    protected ?ServerBinding $amqp = null;

    /**
     * Protocol-specific information for an AMQP 1.0 server.
     */
    protected ?ServerBinding $amqp1 = null;

    /**
     * Protocol-specific information for an MQTT server.
     */
    protected ?ServerBinding $mqtt = null;

    /**
     * Protocol-specific information for an MQTT 5 server.
     */
    protected ?ServerBinding $mqtt5 = null;

    /**
     * Protocol-specific information for a NATS server.
     */
    protected ?ServerBinding $nats = null;

    /**
     * Protocol-specific information for a JMS server.
     */
    protected ?ServerBinding $jms = null;

    /**
     * Protocol-specific information for an SNS server.
     */
    protected ?ServerBinding $sns = null;

    /**
     * Protocol-specific information for a Solace server.
     */
    protected ?ServerBinding $solace = null;

    /**
     * Protocol-specific information for an SQS server.
     */
    protected ?ServerBinding $sqs = null;

    /**
     * Protocol-specific information for a STOMP server.
     */
    protected ?ServerBinding $stomp = null;

    /**
     * Protocol-specific information for a Redis server.
     */
    protected ?ServerBinding $redis = null;

    /**
     * Protocol-specific information for a Mercure server.
     */
    protected ?ServerBinding $mercure = null;

    /**
     * Protocol-specific information for an IBM MQ server.
     */
    protected ?ServerBinding $ibmmq = null;

    /**
     * Protocol-specific information for a Google Cloud Pub/Sub server.
     */
    protected ?ServerBinding $googlepubsub = null;

    /**
     * Protocol-specific information for a Pulsar server.
     */
    protected ?ServerBinding $pulsar = null;

    /**
     * Get HTTP server binding.
     */
    public function getHttp(): ?ServerBinding
    {
        return $this->http;
    }

    /**
     * Set HTTP server binding.
     */
    public function setHttp(?ServerBinding $http): self
    {
        $this->http = $http?->setParentElement($this);
        return $this;
    }

    /**
     * Get WebSockets server binding.
     */
    public function getWs(): ?ServerBinding
    {
        return $this->ws;
    }

    /**
     * Set WebSockets server binding.
     */
    public function setWs(?ServerBinding $ws): self
    {
        $this->ws = $ws?->setParentElement($this);
        return $this;
    }

    /**
     * Get Kafka server binding.
     */
    public function getKafka(): ?ServerBinding
    {
        return $this->kafka;
    }

    /**
     * Set Kafka server binding.
     */
    public function setKafka(?ServerBinding $kafka): self
    {
        $this->kafka = $kafka?->setParentElement($this);
        return $this;
    }

    /**
     * Get Anypoint MQ server binding.
     */
    public function getAnypointmq(): ?ServerBinding
    {
        return $this->anypointmq;
    }

    /**
     * Set Anypoint MQ server binding.
     */
    public function setAnypointmq(?ServerBinding $anypointmq): self
    {
        $this->anypointmq = $anypointmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP server binding.
     */
    public function getAmqp(): ?ServerBinding
    {
        return $this->amqp;
    }

    /**
     * Set AMQP server binding.
     */
    public function setAmqp(?ServerBinding $amqp): self
    {
        $this->amqp = $amqp?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP 1.0 server binding.
     */
    public function getAmqp1(): ?ServerBinding
    {
        return $this->amqp1;
    }

    /**
     * Set AMQP 1.0 server binding.
     */
    public function setAmqp1(?ServerBinding $amqp1): self
    {
        $this->amqp1 = $amqp1?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT server binding.
     */
    public function getMqtt(): ?ServerBinding
    {
        return $this->mqtt;
    }

    /**
     * Set MQTT server binding.
     */
    public function setMqtt(?ServerBinding $mqtt): self
    {
        $this->mqtt = $mqtt?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT 5 server binding.
     */
    public function getMqtt5(): ?ServerBinding
    {
        return $this->mqtt5;
    }

    /**
     * Set MQTT 5 server binding.
     */
    public function setMqtt5(?ServerBinding $mqtt5): self
    {
        $this->mqtt5 = $mqtt5?->setParentElement($this);
        return $this;
    }

    /**
     * Get NATS server binding.
     */
    public function getNats(): ?ServerBinding
    {
        return $this->nats;
    }

    /**
     * Set NATS server binding.
     */
    public function setNats(?ServerBinding $nats): self
    {
        $this->nats = $nats?->setParentElement($this);
        return $this;
    }

    /**
     * Get JMS server binding.
     */
    public function getJms(): ?ServerBinding
    {
        return $this->jms;
    }

    /**
     * Set JMS server binding.
     */
    public function setJms(?ServerBinding $jms): self
    {
        $this->jms = $jms?->setParentElement($this);
        return $this;
    }

    /**
     * Get SNS server binding.
     */
    public function getSns(): ?ServerBinding
    {
        return $this->sns;
    }

    /**
     * Set SNS server binding.
     */
    public function setSns(?ServerBinding $sns): self
    {
        $this->sns = $sns?->setParentElement($this);
        return $this;
    }

    /**
     * Get Solace server binding.
     */
    public function getSolace(): ?ServerBinding
    {
        return $this->solace;
    }

    /**
     * Set Solace server binding.
     */
    public function setSolace(?ServerBinding $solace): self
    {
        $this->solace = $solace?->setParentElement($this);
        return $this;
    }

    /**
     * Get SQS server binding.
     */
    public function getSqs(): ?ServerBinding
    {
        return $this->sqs;
    }

    /**
     * Set SQS server binding.
     */
    public function setSqs(?ServerBinding $sqs): self
    {
        $this->sqs = $sqs?->setParentElement($this);
        return $this;
    }

    /**
     * Get STOMP server binding.
     */
    public function getStomp(): ?ServerBinding
    {
        return $this->stomp;
    }

    /**
     * Set STOMP server binding.
     */
    public function setStomp(?ServerBinding $stomp): self
    {
        $this->stomp = $stomp?->setParentElement($this);
        return $this;
    }

    /**
     * Get Redis server binding.
     */
    public function getRedis(): ?ServerBinding
    {
        return $this->redis;
    }

    /**
     * Set Redis server binding.
     */
    public function setRedis(?ServerBinding $redis): self
    {
        $this->redis = $redis?->setParentElement($this);
        return $this;
    }

    /**
     * Get Mercure server binding.
     */
    public function getMercure(): ?ServerBinding
    {
        return $this->mercure;
    }

    /**
     * Set Mercure server binding.
     */
    public function setMercure(?ServerBinding $mercure): self
    {
        $this->mercure = $mercure?->setParentElement($this);
        return $this;
    }

    /**
     * Get IBM MQ server binding.
     */
    public function getIbmmq(): ?ServerBinding
    {
        return $this->ibmmq;
    }

    /**
     * Set IBM MQ server binding.
     */
    public function setIbmmq(?ServerBinding $ibmmq): self
    {
        $this->ibmmq = $ibmmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get Google Cloud Pub/Sub server binding.
     */
    public function getGooglepubsub(): ?ServerBinding
    {
        return $this->googlepubsub;
    }

    /**
     * Set Google Cloud Pub/Sub server binding.
     */
    public function setGooglepubsub(?ServerBinding $googlepubsub): self
    {
        $this->googlepubsub = $googlepubsub?->setParentElement($this);
        return $this;
    }

    /**
     * Get Pulsar server binding.
     */
    public function getPulsar(): ?ServerBinding
    {
        return $this->pulsar;
    }

    /**
     * Set Pulsar server binding.
     */
    public function setPulsar(?ServerBinding $pulsar): self
    {
        $this->pulsar = $pulsar?->setParentElement($this);
        return $this;
    }
}
