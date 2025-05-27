<?php

namespace Siemendev\AsyncapiPhp\Provision;

use Siemendev\AsyncapiPhp\Configuration\Configuration;

class AsyncApiProvisioner extends AbstractAsyncApiProvisioner
{
    public function provisionOperation(
        Configuration $configuration,
        string $operationName,
        ?string $serverName = null
    ): void {
        throw new \LogicException('Not implemented yet');
    }
}
