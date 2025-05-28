<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\MessageHandler;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\MessageHandler\Exception\MessageHandlerNotFoundException;

class MessageHandlerResolver
{
    /**
     * @param array<string, MessageHandlerInterface<MessageInterface>> $messageHandlers key is message name
     */
    public function __construct(
        private array $messageHandlers = [],
    ) {}

    /**
     * @param MessageHandlerInterface<MessageInterface> $messageHandler
     */
    public function addMessageHandler(MessageHandlerInterface $messageHandler): self
    {
        $this->messageHandlers[$messageHandler->getMessageClass()] = $messageHandler;

        return $this;
    }

    /**
     * @template T of MessageInterface
     * @param class-string<T> $messageClass
     * @return MessageHandlerInterface<T>
     */
    public function resolveMessageHandler(string $messageClass): MessageHandlerInterface
    {
        /** @var MessageHandlerInterface<T>|null $handler */
        $handler = $this->messageHandlers[$messageClass] ?? null;
        if (!$handler) {
            throw new MessageHandlerNotFoundException($messageClass);
        }

        return $handler;
    }
}
