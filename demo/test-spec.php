<?php

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

/** @var AsyncApi $spec */
$spec = require __DIR__ . '/includes/spec.php';

$message = $spec->getOperations()['test_publish']->getMessages()[0];

print_r($message->resolve());