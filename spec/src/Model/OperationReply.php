<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Describes the reply part of a request-reply operation.
 */
class OperationReply extends AsyncApiObject
{
    /**
     * Definition of the address that implementations MUST use for the reply.
     *
     * @var OperationReplyAddress|Reference<OperationReplyAddress>|null
     */
    protected OperationReplyAddress|Reference|null $address = null;

    /**
     * A $ref pointer to the definition of the channel in which this operation is performed.
     * When address is specified, the address property of the channel referenced by this property MUST be either null or not defined.
     * When address is not specified, the address property of the channel referenced by this property MUST be defined and used.
     *
     * @var Reference<Channel>|null
     */
    protected Reference|null $channel = null;

    /**
     * A list of $ref pointers pointing to the supported Message Objects that can be processed by this operation as reply.
     * It MUST contain a subset of the messages defined in the channel referenced in this operation reply.
     *
     * @var array<Reference<Message>>
     */
    protected array $messages = [];

    /**
     * Get the address.
     *
     * @return OperationReplyAddress|Reference<OperationReplyAddress>|null
     */
    public function getAddress(): OperationReplyAddress|Reference|null
    {
        return $this->address;
    }

    /**
     * Set the address.
     *
     * @param OperationReplyAddress|Reference<OperationReplyAddress>|null $address
     */
    public function setAddress(OperationReplyAddress|Reference|null $address): self
    {
        if ($address instanceof AsyncApiObject) {
            $this->address = $address->setParentElement($this);
        } else {
            $this->address = $address;
        }
        return $this;
    }

    /**
     * Get the channel.
     *
     * @return Reference<Channel>|null
     */
    public function getChannel(): Reference|null
    {
        return $this->channel;
    }

    /**
     * Set the channel.
     *
     * @param Reference<Channel>|null $channel
     */
    public function setChannel(Reference|null $channel): self
    {
        if ($channel instanceof AsyncApiObject) {
            $this->channel = $channel->setParentElement($this);
        } else {
            $this->channel = $channel;
        }
        return $this;
    }

    /**
     * Get the messages.
     *
     * @return array<Reference<Message>>
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * Add a message reference.
     *
     * @param Reference<Message> $message
     */
    public function addMessage(Reference $message): self
    {
        $this->messages[] = $message->setParentElement($this);
        return $this;
    }

    /**
     * Set the messages.
     *
     * @param array<Reference<Message>> $messages
     */
    public function setMessages(array $messages): self
    {
        $this->messages = [];
        foreach ($messages as $message) {
            $this->addMessage($message);
        }
        return $this;
    }

    /**
     * Resolves the reference to the address and returns an OperationReplyAddress object.
     */
    public function resolveAddress(): ?OperationReplyAddress
    {
        if ($this->address instanceof Reference) {
            return $this->address->resolve();
        }
        return $this->address;
    }

    /**
     * Resolves the reference to the channel and returns a Channel object.
     */
    public function resolveChannel(): ?Channel
    {
        if ($this->channel instanceof Reference) {
            return $this->channel->resolve();
        }
        return null;
    }

    /**
     * Resolves the references to the messages and returns an array of Message objects.
     *
     * @return array<Message>
     */
    public function resolveMessages(): array
    {
        $messages = [];
        foreach ($this->messages as $messageRef) {
            $messages[] = $messageRef->resolve();
        }
        return $messages;
    }
}
