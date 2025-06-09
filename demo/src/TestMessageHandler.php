<?php

namespace Siemendev\AsyncapiPhp\Demo;

use Siemendev\AsyncapiPhp\Demo\Stub\TestMessage;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\MessageHandlerInterface;

/** @implements MessageHandlerInterface<TestMessage> */
class TestMessageHandler implements MessageHandlerInterface
{
    public function getMessageClass(): string
    {
        return TestMessage::class;
    }

    public function handle(MessageInterface $message): void
    {
        print_r($message);
        echo PHP_EOL;
    }
}
