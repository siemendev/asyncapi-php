<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Provision;

use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Exception\ReferenceNotFoundException;

class AsyncApiProvisioner extends AbstractAsyncApiProvisioner
{
    /**
     * @throws InvalidSpecificationException
     * @throws NoMatchingAdapterFoundException
     * @throws CredentialsNotFoundException
     * @throws ReferenceNotFoundException
     */
    public function provisionOperation(
        Configuration $configuration,
        string $operationName,
        ?string $serverName = null,
    ): void {
        $operation = $configuration->getSpec()->getOperation($operationName);
        $channel = $operation->resolveChannel();
        $serverName ??= $channel->getDefaultServerName();
        $this->adapterResolver
            ->resolveAdapter(
                $channel->resolveServer($serverName),
                $configuration->getCredentials($serverName),
            )
            ->provisionOperation($operation)
        ;
    }
}
