<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Siemendev\AsyncapiPhp\Spec\Demo\CompleteAsyncApiDemo;

// Generate the json
$json = CompleteAsyncApiDemo::generate();

// Output the json
echo $json;

// Save the json to a file
CompleteAsyncApiDemo::saveToFile(__DIR__ . '/complete_asyncapi.json');