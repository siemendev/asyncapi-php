<?php

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Tests;

use PHPUnit\Framework\TestCase;
use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

class FullTest extends TestCase
{
    public function test(): void
    {
        $this->getManager()->provisionOperation('test_publish');
        $this->getManager()->provisionOperation('test_receive');

        $message = new TestMessage('John Doe', 30);

        $messageHandler = new TestMessageHandler();

        $this->getManager()->addMessageHandler($messageHandler);

        $this->getManager()->publishMessage($message, 'test_publish');

        // Run startReceivingMessages in a fiber for concurrent execution
        $fiber = new \Fiber(function() {
            // This will now use the non-blocking implementation
            $this->getManager()->startReceivingMessages('test_receive');
            return "Consumption completed";
        });

        // Start the fiber
        $fiber->start();

        sleep(1);// Allow some time for the message to be processed

        // Stop receiving messages
        $this->getManager()->stopReceivingMessages();

        sleep(1) ; // Allow some time for the shutdown process to complete

        self::assertFalse($fiber->isRunning(), 'Fiber is still running after stopReceivingMessages was called');

        // Assert that the message was received and handled
        self::assertNotEmpty($messageHandler->getMessages(), 'No messages were received by the handler');
        self::assertCount(1, $messageHandler->getMessages(), 'Expected exactly one message');
        self::assertInstanceOf(TestMessage::class, $messageHandler->getMessages()[0], 'Received message is not an instance of TestMessage');
        self::assertSame('John Doe', $messageHandler->getMessages()[0]->getName(), 'Message content does not match');
        self::assertSame(30, $messageHandler->getMessages()[0]->getAge(), 'Message age does not match');
    }

    public function getSpec(): AsyncApi
    {
        global $spec;

        if (!$spec instanceof AsyncApi) {
            throw new \RuntimeException('Spec is not set or not an instance of AsyncApi');
        }

        return $spec;
    }

    public function getManager(): AsyncApiManager
    {
        global $manager;

        if (!$manager instanceof AsyncApiManager) {
            throw new \RuntimeException('Manager is not set or not an instance of AsyncApiManager');
        }

        return $manager;
    }
}
