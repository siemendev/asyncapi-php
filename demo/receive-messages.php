<?php

/** @var AsyncApiManager $manager */

use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Demo\Stub\TestMessage;
use Siemendev\AsyncapiPhp\Exception\AsyncApiPhpException;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\MessageHandlerInterface;

/** @var AsyncApiManager $manager */
$manager = include __DIR__ . '/includes/setup.php';

$manager->addMessageHandler(
    /** @implements MessageHandlerInterface<TestMessage> */
    new class implements MessageHandlerInterface {
        public function getMessageClass(): string
        {
            return TestMessage::class;
        }

        public function handle(MessageInterface $message): void
        {
            echo 'Received message: ' . $message->getContent() . PHP_EOL;
        }
    }
);

try {
    $manager->startReceivingMessages('test_receive');
} catch (AsyncApiPhpException $e) {
    echo 'Error: ' . $e->getMessage() . '(' . $e::class . ')' . PHP_EOL;
    print_r($e);
    echo $e->getTraceAsString() . PHP_EOL;
    exit(1);
}