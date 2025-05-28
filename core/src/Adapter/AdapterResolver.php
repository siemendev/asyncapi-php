<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter;

use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

class AdapterResolver
{
    /** @var AdapterInterface[] */
    private array $adapters = [];

    public function addAdapter(AdapterInterface $adapter): self
    {
        $this->adapters[] = $adapter;

        return $this;
    }

    /**
     * @throws NoMatchingAdapterFoundException
     */
    public function resolveAdapter(Server $serverSpec, CredentialsInterface $credentials): AdapterInterface
    {
        foreach ($this->adapters as $adapter) {
            if ($adapter->supports($serverSpec, $credentials)) {
                return (clone $adapter)
                    ->setServerSpec($serverSpec)
                    ->setCredentials($credentials)
                ;
            }
        }

        throw new NoMatchingAdapterFoundException($serverSpec);
    }
}
