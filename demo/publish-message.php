<?php

/** @var AsyncApiManager $manager */

use Siemendev\AsyncapiPhp\Demo\Stub\TestMessage;
use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Exception\AsyncApiPhpException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

/** @var AsyncApiManager $manager */
$manager = include __DIR__ . '/includes/setup.php';

try {
    $manager->publishMessage(
        new TestMessage('John Doe', 30),
        operationName: 'test_publish'
    );
} catch (AsyncApiPhpException $e) {
    echo 'Error: ' . $e->getMessage() . '(' . $e::class . ')' . PHP_EOL;
    print_r($e);
    echo $e->getTraceAsString() . PHP_EOL;
    exit(1);
}