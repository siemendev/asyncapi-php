<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Publish;

use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;

interface AsyncApiPublisherInterface
{
    /**
     * @throws InvalidAdapterConfigurationException
     * @throws CredentialsNotFoundException
     * @throws InvalidSpecificationException
     * @throws MessagePublishFailedException
     * @throws NoMatchingAdapterFoundException
     * @throws SerializationException
     */
    public function publishMessage(
        Configuration $configuration,
        MessageInterface $message,
        string $operationName,
        ?string $serverName = null,
    ): void;

    public function setAdapterResolver(AdapterResolver $adapterManager): self;

    public function setSerializationHandler(SerializationHandler $serializer): self;
}
