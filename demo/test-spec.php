<?php

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

/** @var AsyncApi $spec */
$spec = require __DIR__ . '/includes/spec.php';

$message = $spec->getOperations()['test_publish']->resolveMessages();

print_r($message);