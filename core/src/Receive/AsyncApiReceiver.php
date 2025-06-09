<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive;

use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception\MessageHandlerErrorException;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception\MessageHandlerFailedException;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Exception\ReferenceNotFoundException;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;

class AsyncApiReceiver extends AbstractAsyncApiReceiver
{
    /**
     * @throws InvalidSpecificationException
     * @throws NoMatchingAdapterFoundException
     * @throws CredentialsNotFoundException
     * @throws SerializationException
     * @throws ReferenceNotFoundException
     */
    public function startReceivingMessages(
        Configuration $configuration,
        string $operationName,
        ?string $serverName = null,
    ): void {
        $operation = $configuration->getSpec()->getOperation($operationName);
        $channel = $operation->resolveChannel();
        $serverName ??= $channel->getDefaultServerName();

        $this->adapterResolver
            ->resolveAdapter(
                $channel->resolveServer($serverName),
                $configuration->getCredentials($serverName),
            )
            ->consume(
                $operation,
                fn(string $payload, array $headers) => $this->handleMessage(
                    $configuration,
                    $operation,
                    $payload,
                    $headers,
                ),
            )
        ;
    }

    public function stopReceivingMessages(): void
    {
        foreach ($this->adapterResolver->getAdapters() as $adapter) {
            $adapter->stopConsuming();
        }
    }

    /**
     * @param array<string, scalar|null> $headers
     * @throws InvalidSpecificationException
     * @throws MessageHandlerFailedException
     * @throws SerializationException
     * @throws MessageHandlerErrorException
     */
    private function handleMessage(
        Configuration $configuration,
        Operation $operation,
        string $payload,
        array $headers,
    ): void {
        $typeHint = array_key_exists('type', $headers) ? (string) $headers['type'] : null;
        $typeHint ??= array_key_exists('messageType', $headers) ? (string) $headers['messageType'] : null;
        $typeHint ??= array_key_exists('message-type', $headers) ? (string) $headers['message-type'] : null;
        $typeHint ??= array_key_exists('message_type', $headers) ? (string) $headers['message_type'] : null;

        $message = $this->messageMapper->mapMessage($configuration, $operation, $payload, $typeHint);
        foreach ($headers as $key => $value) {
            $message->setHeader($key, $value);
        }

        $this->messageHandlerResolver->resolveMessageHandler($message::class)->handle($message);
    }
}
