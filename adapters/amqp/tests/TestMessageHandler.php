<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Tests;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\MessageHandlerInterface;

/** @implements MessageHandlerInterface<TestMessage> */
class TestMessageHandler implements MessageHandlerInterface
{
    /** @var TestMessage[] */
    private array $messages = [];

    public function getMessageClass(): string
    {
        return TestMessage::class;
    }

    public function handle(MessageInterface $message): void
    {
        $this->messages[] = $message;
    }

    /** @return TestMessage[] */
    public function getMessages(): array
    {
        return $this->messages;
    }
}
