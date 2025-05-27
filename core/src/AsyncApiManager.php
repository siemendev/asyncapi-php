<?php

namespace Siemendev\AsyncapiPhp;

use LogicException;
use Siemendev\AsyncapiPhp\Adapter\AdapterInterface;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\MessageHandler\MessageHandlerInterface;
use Siemendev\AsyncapiPhp\Serializer\SerializerInterface;

class AsyncApiManager extends AbstractAsyncApiManager
{
    public function generateStub(): void
    {
        if (!isset($this->generator)) {
            throw new LogicException('Generator not initialized'); # todo change this to be more helpful
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

    public function provisionOperation(string $operation, ?string $serverName = null): void
    {
        $this->provisioner->provisionOperation($this->configuration, $operation, $serverName);
    }

    public function receiveMessages(string $operationName, ?string $serverName = null): void
    {
        $this->receiver->receiveMessages($this->configuration, $operationName, $serverName);
    }

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
