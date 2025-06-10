<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp;

use Siemendev\AsyncapiPhp\Adapter\AdapterInterface;
use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\MessageHandlerInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Serializer\SerializerInterface;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;

interface AsyncApiManagerInterface
{
    public function generateStub(): void;

    /**
     * @throws InvalidAdapterConfigurationException
     * @throws CredentialsNotFoundException
     * @throws InvalidSpecificationException
     * @throws MessagePublishFailedException
     * @throws NoMatchingAdapterFoundException
     * @throws SerializationException
     */
    public function publishMessage(
        MessageInterface $message,
        string $operationName,
        ?string $serverName = null,
    ): void;

    public function startReceivingMessages(string $operationName, ?string $serverName = null): void;

    public function provisionOperation(string $operation, ?string $serverName = null): void;

    /**
     * @return $this
     */
    public function addMessageHandler(MessageHandlerInterface $messageHandler): self;

    /**
     * @return $this
     */
    public function addAdapter(AdapterInterface $adapter): self;

    /**
     * @return $this
     */
    public function addSerializer(SerializerInterface $serializer): self;
}
