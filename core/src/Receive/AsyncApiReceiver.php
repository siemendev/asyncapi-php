<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive;

use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
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
    public function receiveMessages(
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

    /**
     * @param array<string, scalar|null> $headers
     * @throws InvalidSpecificationException
     * @throws SerializationException
     */
    private function handleMessage(
        Configuration $configuration,
        Operation $operation,
        string $payload,
        array $headers,
    ): void {
        $message = $this->messageMapper->mapMessage(
            $configuration,
            $operation,
            $payload,
            array_key_exists('type', $headers) ? (string) $headers['type'] : null,
        );
        foreach ($headers as $key => $value) {
            $message->setHeader($key, $value);
        }

        $this->messageHandlerResolver->resolveMessageHandler($message::class)->handle($message);
    }
}
