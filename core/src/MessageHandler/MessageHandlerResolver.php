<?php

namespace Siemendev\AsyncapiPhp\MessageHandler;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\MessageHandler\Exception\MessageHandlerNotFoundException;

class MessageHandlerResolver
{
    /** @param array<string, MessageHandlerInterface> $messageHandlers key is message name */
    public function __construct(
        private array $messageHandlers = [],
    ) {
    }

    public function addMessageHandler(MessageHandlerInterface $messageHandler): self
    {
        $this->messageHandlers[$messageHandler->getMessageClass()] = $messageHandler;

        return $this;
    }

    /** @param class-string<MessageInterface> $messageClass */
    public function resolveMessageHandler(string $messageClass): MessageHandlerInterface
    {
        return $this->messageHandlers[$messageClass] ?? throw new MessageHandlerNotFoundException($messageClass);
    }
}