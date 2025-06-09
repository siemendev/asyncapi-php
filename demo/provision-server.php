<?php

use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Exception\AsyncApiPhpException;

/** @var AsyncApiManager $manager */
$manager = include __DIR__ . '/includes/setup.php';

try {
    $manager->provisionOperation('test_publish');
    $manager->provisionOperation('test_receive');
} catch (AsyncApiPhpException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    print_r($e);
    exit(1);
}
