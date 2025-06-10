<?php

use Siemendev\AsyncapiPhp\AsyncApiManager;

require_once 'setup.php';

global $manager;

if (!$manager instanceof AsyncApiManager) {
    throw new \RuntimeException('Manager is not set or not an instance of AsyncApiManager');
}

$manager->generateStub();