<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model\References;

use Siemendev\AsyncapiPhp\Spec\Model\Reference;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

/** @extends Reference<Server> */
class ServerReference extends Reference
{
    public function __construct(string $serverName)
    {
        parent::__construct(sprintf(
            '#/servers/%s',
            $serverName,
        ));
    }
}
