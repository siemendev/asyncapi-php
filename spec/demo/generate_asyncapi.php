<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Siemendev\AsyncapiPhp\Spec\Demo\Example;

// Generate the json
$json = Example::generate();

// Output the json
echo $json;

// Optionally, save the json to a file
file_put_contents(__DIR__ . '/asyncapi.json', $json);

echo PHP_EOL . "AsyncAPI specification generated and saved to " . __DIR__ . "/asyncapi.json" . PHP_EOL;
