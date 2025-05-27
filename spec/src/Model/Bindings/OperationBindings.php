<?php

namespace Siemendev\AsyncapiPhp\Spec\Model\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;

/**
 * Operation Bindings Object
 * 
 * Map describing protocol-specific definitions for an operation.
 * 
 * @see https://www.asyncapi.com/docs/reference/specification/latest#operationBindingsObject
 */
class OperationBindings extends AsyncApiObject
{
    /**
     * Protocol-specific information for an HTTP operation.
     */
    protected ?OperationBinding $http = null;

    /**
     * Protocol-specific information for a WebSockets operation.
     */
    protected ?OperationBinding $ws = null;

    /**
     * Protocol-specific information for a Kafka operation.
     */
    protected ?OperationBinding $kafka = null;

    /**
     * Protocol-specific information for an Anypoint MQ operation.
     */
    protected ?OperationBinding $anypointmq = null;

    /**
     * Protocol-specific information for an AMQP 0-9-1 operation.
     */
    protected ?OperationBinding $amqp = null;

    /**
     * Protocol-specific information for an AMQP 1.0 operation.
     */
    protected ?OperationBinding $amqp1 = null;

    /**
     * Protocol-specific information for an MQTT operation.
     */
    protected ?OperationBinding $mqtt = null;

    /**
     * Protocol-specific information for an MQTT 5 operation.
     */
    protected ?OperationBinding $mqtt5 = null;

    /**
     * Protocol-specific information for a NATS operation.
     */
    protected ?OperationBinding $nats = null;

    /**
     * Protocol-specific information for a JMS operation.
     */
    protected ?OperationBinding $jms = null;

    /**
     * Protocol-specific information for an SNS operation.
     */
    protected ?OperationBinding $sns = null;

    /**
     * Protocol-specific information for a Solace operation.
     */
    protected ?OperationBinding $solace = null;

    /**
     * Protocol-specific information for an SQS operation.
     */
    protected ?OperationBinding $sqs = null;

    /**
     * Protocol-specific information for a STOMP operation.
     */
    protected ?OperationBinding $stomp = null;

    /**
     * Protocol-specific information for a Redis operation.
     */
    protected ?OperationBinding $redis = null;

    /**
     * Protocol-specific information for a Mercure operation.
     */
    protected ?OperationBinding $mercure = null;

    /**
     * Protocol-specific information for an IBM MQ operation.
     */
    protected ?OperationBinding $ibmmq = null;

    /**
     * Protocol-specific information for a Google Cloud Pub/Sub operation.
     */
    protected ?OperationBinding $googlepubsub = null;

    /**
     * Protocol-specific information for a Pulsar operation.
     */
    protected ?OperationBinding $pulsar = null;

    /**
     * Get HTTP operation binding.
     */
    public function getHttp(): ?OperationBinding
    {
        return $this->http;
    }

    /**
     * Set HTTP operation binding.
     */
    public function setHttp(?OperationBinding $http): self
    {
        $this->http = $http?->setParentElement($this);
        return $this;
    }

    /**
     * Get WebSockets operation binding.
     */
    public function getWs(): ?OperationBinding
    {
        return $this->ws;
    }

    /**
     * Set WebSockets operation binding.
     */
    public function setWs(?OperationBinding $ws): self
    {
        $this->ws = $ws?->setParentElement($this);
        return $this;
    }

    /**
     * Get Kafka operation binding.
     */
    public function getKafka(): ?OperationBinding
    {
        return $this->kafka;
    }

    /**
     * Set Kafka operation binding.
     */
    public function setKafka(?OperationBinding $kafka): self
    {
        $this->kafka = $kafka?->setParentElement($this);
        return $this;
    }

    /**
     * Get Anypoint MQ operation binding.
     */
    public function getAnypointmq(): ?OperationBinding
    {
        return $this->anypointmq;
    }

    /**
     * Set Anypoint MQ operation binding.
     */
    public function setAnypointmq(?OperationBinding $anypointmq): self
    {
        $this->anypointmq = $anypointmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP operation binding.
     */
    public function getAmqp(): ?OperationBinding
    {
        return $this->amqp;
    }

    /**
     * Set AMQP operation binding.
     */
    public function setAmqp(?OperationBinding $amqp): self
    {
        $this->amqp = $amqp?->setParentElement($this);
        return $this;
    }

    /**
     * Get AMQP 1.0 operation binding.
     */
    public function getAmqp1(): ?OperationBinding
    {
        return $this->amqp1;
    }

    /**
     * Set AMQP 1.0 operation binding.
     */
    public function setAmqp1(?OperationBinding $amqp1): self
    {
        $this->amqp1 = $amqp1?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT operation binding.
     */
    public function getMqtt(): ?OperationBinding
    {
        return $this->mqtt;
    }

    /**
     * Set MQTT operation binding.
     */
    public function setMqtt(?OperationBinding $mqtt): self
    {
        $this->mqtt = $mqtt?->setParentElement($this);
        return $this;
    }

    /**
     * Get MQTT 5 operation binding.
     */
    public function getMqtt5(): ?OperationBinding
    {
        return $this->mqtt5;
    }

    /**
     * Set MQTT 5 operation binding.
     */
    public function setMqtt5(?OperationBinding $mqtt5): self
    {
        $this->mqtt5 = $mqtt5?->setParentElement($this);
        return $this;
    }

    /**
     * Get NATS operation binding.
     */
    public function getNats(): ?OperationBinding
    {
        return $this->nats;
    }

    /**
     * Set NATS operation binding.
     */
    public function setNats(?OperationBinding $nats): self
    {
        $this->nats = $nats?->setParentElement($this);
        return $this;
    }

    /**
     * Get JMS operation binding.
     */
    public function getJms(): ?OperationBinding
    {
        return $this->jms;
    }

    /**
     * Set JMS operation binding.
     */
    public function setJms(?OperationBinding $jms): self
    {
        $this->jms = $jms?->setParentElement($this);
        return $this;
    }

    /**
     * Get SNS operation binding.
     */
    public function getSns(): ?OperationBinding
    {
        return $this->sns;
    }

    /**
     * Set SNS operation binding.
     */
    public function setSns(?OperationBinding $sns): self
    {
        $this->sns = $sns?->setParentElement($this);
        return $this;
    }

    /**
     * Get Solace operation binding.
     */
    public function getSolace(): ?OperationBinding
    {
        return $this->solace;
    }

    /**
     * Set Solace operation binding.
     */
    public function setSolace(?OperationBinding $solace): self
    {
        $this->solace = $solace?->setParentElement($this);
        return $this;
    }

    /**
     * Get SQS operation binding.
     */
    public function getSqs(): ?OperationBinding
    {
        return $this->sqs;
    }

    /**
     * Set SQS operation binding.
     */
    public function setSqs(?OperationBinding $sqs): self
    {
        $this->sqs = $sqs?->setParentElement($this);
        return $this;
    }

    /**
     * Get STOMP operation binding.
     */
    public function getStomp(): ?OperationBinding
    {
        return $this->stomp;
    }

    /**
     * Set STOMP operation binding.
     */
    public function setStomp(?OperationBinding $stomp): self
    {
        $this->stomp = $stomp?->setParentElement($this);
        return $this;
    }

    /**
     * Get Redis operation binding.
     */
    public function getRedis(): ?OperationBinding
    {
        return $this->redis;
    }

    /**
     * Set Redis operation binding.
     */
    public function setRedis(?OperationBinding $redis): self
    {
        $this->redis = $redis?->setParentElement($this);
        return $this;
    }

    /**
     * Get Mercure operation binding.
     */
    public function getMercure(): ?OperationBinding
    {
        return $this->mercure;
    }

    /**
     * Set Mercure operation binding.
     */
    public function setMercure(?OperationBinding $mercure): self
    {
        $this->mercure = $mercure?->setParentElement($this);
        return $this;
    }

    /**
     * Get IBM MQ operation binding.
     */
    public function getIbmmq(): ?OperationBinding
    {
        return $this->ibmmq;
    }

    /**
     * Set IBM MQ operation binding.
     */
    public function setIbmmq(?OperationBinding $ibmmq): self
    {
        $this->ibmmq = $ibmmq?->setParentElement($this);
        return $this;
    }

    /**
     * Get Google Cloud Pub/Sub operation binding.
     */
    public function getGooglepubsub(): ?OperationBinding
    {
        return $this->googlepubsub;
    }

    /**
     * Set Google Cloud Pub/Sub operation binding.
     */
    public function setGooglepubsub(?OperationBinding $googlepubsub): self
    {
        $this->googlepubsub = $googlepubsub?->setParentElement($this);
        return $this;
    }

    /**
     * Get Pulsar operation binding.
     */
    public function getPulsar(): ?OperationBinding
    {
        return $this->pulsar;
    }

    /**
     * Set Pulsar operation binding.
     */
    public function setPulsar(?OperationBinding $pulsar): self
    {
        $this->pulsar = $pulsar?->setParentElement($this);
        return $this;
    }
}
