<?php

/** @var AsyncApiManager $manager */

use Siemendev\AsyncapiPhp\Demo\Stub\TestMessage;
use Siemendev\AsyncapiPhp\AsyncApiManager;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

/** @var AsyncApiManager $manager */
$manager = include __DIR__ . '/includes/setup.php';

$manager->receiveMessages('test_receive');