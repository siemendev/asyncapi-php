<?php

namespace Siemendev\AsyncapiPhp\Adapter\Exception;

use Siemendev\AsyncapiPhp\Spec\Model\Server;

class NoMatchingAdapterFoundException extends \Exception
{
    public function __construct(public readonly Server $config)
    {
        parent::__construct('No matching adapter found for server config');
    }
}
