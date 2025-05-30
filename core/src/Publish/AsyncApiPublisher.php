<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Publish;

use LogicException;
use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;

class AsyncApiPublisher extends AbstractAsyncApiPublisher
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
    ): void {
        $operation = $configuration->getSpec()->getOperations()[$operationName] ?? null;
        if (!$operation instanceof Operation) {
            throw new InvalidSpecificationException('Operation not found: ' . $operationName); // todo change this to be more helpful
        }
        $channel = $this->specRepo->getOperationChannel($operation);

        $serverName ??= $this->specRepo->getDefaultServerNameForChannel($channel);

        foreach ($operation->resolveMessages() as $operationMessage) {
            if ($operationMessage->getName() === $message::getMessageName()) {
                $messageSpec = $operationMessage;
                break;
            }
        }
        if (!isset($messageSpec)) {
            throw new LogicException(sprintf('Message "%s" not found in operation "%s"', $message::getMessageName(), $operationName)); // todo change this to be more helpful
        }

        $contentType = $messageSpec->getContentType() ?? $configuration->getSpec()->getDefaultContentType();

        if (!$contentType) {
            throw new InvalidSpecificationException('No content type defined for message'); // todo change this to be more helpful
        }

        $this->adapterResolver
            ->resolveAdapter(
                $this->specRepo->getServerForChannel($channel, $serverName),
                $configuration->getCredentials($serverName),
            )
            ->publish(
                $operation,
                $messageSpec,
                $this->serializer->serialize($contentType, $message),
                $contentType,
                $message->getHeaders(),
            )
        ;
    }
}
