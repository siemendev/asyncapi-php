<?php

namespace Siemendev\AsyncapiPhp\Configuration;

use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

class Configuration
{
    /**
     * @param array<string, CredentialsInterface> $credentials key is the name of the server
     */
    public function __construct(
        private readonly AsyncApi $spec,
        private readonly StubConfiguration $stub,
        private array $credentials = [],
    ) {
    }

    public function getSpec(): AsyncApi
    {
        return $this->spec;
    }

    public function getStub(): StubConfiguration
    {
        return $this->stub;
    }

    /**
     * @throws CredentialsNotFoundException
     */
    public function getCredentials(string $name): CredentialsInterface
    {
        return $this->credentials[$name] ?? throw new CredentialsNotFoundException();
    }

    public function setCredentials(string $name, CredentialsInterface $credentials): self
    {
        $this->credentials[$name] = $credentials;

        return $this;
    }
}
