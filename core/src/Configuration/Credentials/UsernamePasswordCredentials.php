<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Configuration\Credentials;

use SensitiveParameter;

class UsernamePasswordCredentials implements CredentialsInterface
{
    public function __construct(
        #[SensitiveParameter]
        private readonly string $username,
        #[SensitiveParameter]
        private readonly string $password,
    ) {}

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
