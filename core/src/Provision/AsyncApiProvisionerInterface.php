<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Provision;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\Configuration\Configuration;

interface AsyncApiProvisionerInterface
{
    public function provisionOperation(
        Configuration $configuration,
        string $operationName,
        ?string $serverName = null,
    ): void;

    public function setAdapterResolver(AdapterResolver $adapterResolver): self;
}
