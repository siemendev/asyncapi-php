<?php

/** @var AsyncApiManager $manager */

use Siemendev\AsyncapiPhp\AsyncApiManager;

/** @var AsyncApiManager $manager */
$manager = include __DIR__ . '/includes/setup.php';

$manager->startReceivingMessages('test_receive');