<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Provision;

use Siemendev\AsyncapiPhp\Configuration\Configuration;
use LogicException;

class AsyncApiProvisioner extends AbstractAsyncApiProvisioner
{
    public function provisionOperation(
        Configuration $configuration,
        string $operationName,
        ?string $serverName = null,
    ): void {
        throw new LogicException('Not implemented yet');
    }
}
