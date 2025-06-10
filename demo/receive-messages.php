<?php

/** @var AsyncApiManager $manager */

use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Demo\TestMessageHandler;
use Siemendev\AsyncapiPhp\Exception\AsyncApiPhpException;

/** @var AsyncApiManager $manager */
$manager = include __DIR__ . '/includes/setup.php';

$manager->addMessageHandler(new TestMessageHandler());

try {
    $manager->startReceivingMessages('test_receive');
} catch (AsyncApiPhpException $e) {
    echo 'Error: ' . $e->getMessage() . '(' . $e::class . ')' . PHP_EOL;
    print_r($e);
    echo $e->getTraceAsString() . PHP_EOL;
    exit(1);
}