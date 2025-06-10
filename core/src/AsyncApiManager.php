<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp;

use LogicException;
use Siemendev\AsyncapiPhp\Adapter\AdapterInterface;
use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\MessageHandlerInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Serializer\SerializerInterface;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Exception\ReferenceNotFoundException;

class AsyncApiManager extends AbstractAsyncApiManager
{
    public function generateStub(): void
    {
        if (!isset($this->generator)) {
            throw new LogicException('Generator not initialized'); // todo change this to be more helpful
        }
        $this->generator->generateStub($this->configuration->getSpec(), $this->configuration->getStub());
    }

    public function publishMessage(
        MessageInterface $message,
        string $operationName,
        ?string $serverName = null,
    ): void {
        $this->publisher->publishMessage(
            $this->configuration,
            $message,
            $operationName,
            $serverName,
        );
    }

    /**
     * @throws InvalidSpecificationException
     * @throws ReferenceNotFoundException
     * @throws CredentialsNotFoundException
     * @throws NoMatchingAdapterFoundException
     */
    public function provisionOperation(string $operation, ?string $serverName = null): void
    {
        $this->provisioner->provisionOperation($this->configuration, $operation, $serverName);
    }

    /**
     * @throws InvalidSpecificationException
     * @throws ReferenceNotFoundException
     * @throws NoMatchingAdapterFoundException
     * @throws SerializationException
     * @throws CredentialsNotFoundException
     */
    public function startReceivingMessages(string $operationName, ?string $serverName = null): void
    {
        $this->receiver->startReceivingMessages($this->configuration, $operationName, $serverName);
    }

    public function stopReceivingMessages(): void
    {
        $this->receiver->stopReceivingMessages();
    }

    /**
     * @template T of \Siemendev\AsyncapiPhp\Message\MessageInterface
     * @param MessageHandlerInterface<T> $messageHandler
     * @return $this
     */
    public function addMessageHandler(MessageHandlerInterface $messageHandler): self
    {
        $this->messageHandlerResolver->addMessageHandler($messageHandler);

        return $this;
    }

    public function addAdapter(AdapterInterface $adapter): self
    {
        $this->adapterResolver->addAdapter($adapter);

        return $this;
    }

    public function addSerializer(SerializerInterface $serializer): self
    {
        $this->serializer->addSerializer($serializer);

        return $this;
    }
}
