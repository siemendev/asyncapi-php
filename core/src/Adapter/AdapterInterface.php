<?php

namespace Siemendev\AsyncapiPhp\Adapter;

use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Configuration\Credentials\CredentialsInterface;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

interface AdapterInterface
{
    public function supports(Server $serverSpec, CredentialsInterface $credentials): bool;

    /**
     * @throws InvalidAdapterConfigurationException
     * @throws InvalidSpecificationException
     * @throws MessagePublishFailedException
     */
    public function publishMessage(Operation $operation, Message $message, string $content, string $contentType, array $headers = []): void;

    /**
     * @param callable(string $messageData): void $callback
     */
    public function consume(Operation $operation, callable $callback): void;

    public function setRootSpec(AsyncApi $rootSpec): self;

    public function setServerSpec(Server $serverSpec): self;

    public function setCredentials(CredentialsInterface $credentials): self;
}
