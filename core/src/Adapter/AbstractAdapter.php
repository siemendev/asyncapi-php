<?php

namespace Siemendev\AsyncapiPhp\Adapter;

use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

abstract class AbstractAdapter implements AdapterInterface
{
    private Server $serverSpec;
    private CredentialsInterface $credentials;

    public function getServerSpec(): Server
    {
        return $this->serverSpec;
    }
    public function setServerSpec(Server $serverSpec): AdapterInterface
    {
        $this->serverSpec = $serverSpec;

        return $this;
    }

    public function getCredentials(): CredentialsInterface
    {
        return $this->credentials;
    }
    public function setCredentials(CredentialsInterface $credentials): AdapterInterface
    {
        $this->credentials = $credentials;

        return $this;
    }
}
