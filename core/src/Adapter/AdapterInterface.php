<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter;

use Siemendev\AsyncapiPhp\Adapter\Exception\AdapterFeatureNotImplementedException;
use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

interface AdapterInterface
{
    public function supports(Server $serverSpec): bool;

    /**
     * @param array<string, scalar|null> $headers
     * @throws InvalidAdapterConfigurationException
     * @throws InvalidSpecificationException
     * @throws MessagePublishFailedException
     * @throws AdapterFeatureNotImplementedException
     */
    public function publish(
        Operation $operation,
        Message $message,
        string $content,
        string $contentType,
        array $headers = [],
    ): void;

    /**
     * @param callable(string $payload, array<string, scalar|null> $headers): void $callback
     * @throws AdapterFeatureNotImplementedException
     */
    public function consume(Operation $operation, callable $callback): void;

    public function stopConsuming(): void;

    /**
     * @throws AdapterFeatureNotImplementedException
     */
    public function provisionOperation(Operation $operation): void;

    public function setServerSpec(Server $serverSpec): self;

    public function setCredentials(CredentialsInterface $credentials): self;
}
