<?php

use Siemendev\AsyncapiPhp\AsyncApiManager;

/** @var AsyncApiManager $manager */
$manager = include __DIR__ . '/includes/setup.php';

$manager->provisionOperation('test_publish');
$manager->provisionOperation('test_receive');
