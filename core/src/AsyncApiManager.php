<?php

namespace Siemendev\AsyncapiPhp;

use LogicException;
use Siemendev\AsyncapiPhp\Adapter\AdapterInterface;
use Siemendev\AsyncapiPhp\Adapter\AdapterResolver;
use Siemendev\AsyncapiPhp\Adapter\Exception\InvalidAdapterConfigurationException;
use Siemendev\AsyncapiPhp\Adapter\Exception\MessagePublishFailedException;
use Siemendev\AsyncapiPhp\Adapter\Exception\NoMatchingAdapterFoundException;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Configuration\Exception\CredentialsNotFoundException;
use Siemendev\AsyncapiPhp\Generator\Generator;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\MessageHandler\MessageHandlerInterface;
use Siemendev\AsyncapiPhp\MessageHandler\MessageHandlerResolver;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;
use Siemendev\AsyncapiPhp\Serializer\SerializerInterface;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Helper\ReferenceResolver;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\SpecRepository;

class AsyncApiManager
{
    private AdapterResolver $adapterManager;

    private MessageHandlerResolver $messageHandlerResolver;

    private SpecRepository $specRepo;

    private SerializationHandler $serializer;

    private Generator $generator;

    public function __construct(
        private Configuration $configuration,
        ?AdapterResolver $adapterManager = null,
        ?MessageHandlerResolver $messageHandlerResolver = null,
        ?SpecRepository $specRepo = null,
        ?SerializationHandler $serializer = null,
        ?Generator $generator = null,
    ) {
        $this->adapterManager = $adapterManager ?? new AdapterResolver();
        $this->messageHandlerResolver = $messageHandlerResolver ?? new MessageHandlerResolver();
        $this->specRepo = $specRepo ?? new SpecRepository();
        $this->serializer = $serializer ?? new SerializationHandler();
        if ($generator) {
            $this->generator = $generator;
        }
    }

    public function setConfiguration(Configuration $configuration): self
    {
        $this->configuration = $configuration;

        return $this;
    }

    public function addSerializer(SerializerInterface $serializer): self
    {
        $this->serializer->addSerializer($serializer);

        return $this;
    }

    public function setGenerator(Generator $generator): self
    {
        $this->generator = $generator;

        return $this;
    }

    public function setAdapterManager(AdapterResolver $adapterManager): self
    {
        $this->adapterManager = $adapterManager;

        return $this;
    }

    public function setMessageHandlerResolver(MessageHandlerResolver $messageHandlerResolver): self
    {
        $this->messageHandlerResolver = $messageHandlerResolver;

        return $this;
    }

    public function addAdapter(AdapterInterface $adapter): self
    {
        $this->adapterManager->addAdapter($adapter);

        return $this;
    }

    public function addMessageHandler(MessageHandlerInterface $messageHandler): self
    {
        $this->messageHandlerResolver->addMessageHandler($messageHandler);

        return $this;
    }

    public function generateStub(): void
    {
        if (!isset($this->generator)) {
            throw new LogicException('Generator not initialized'); # todo change this to be more helpful
        }
        $this->generator->generateStub($this->configuration->getSpec(), $this->configuration->getStub());
    }

    /**
     * @throws InvalidAdapterConfigurationException
     * @throws CredentialsNotFoundException
     * @throws InvalidSpecificationException
     * @throws MessagePublishFailedException
     * @throws NoMatchingAdapterFoundException
     * @throws SerializationException
     */
    public function publishMessage(
        string $operationName,
        MessageInterface $message,
    ): void {
        $operation = $this->configuration->getSpec()->getOperations()[$operationName] ?? null;
        if (!$operation instanceof Operation) {
            throw new LogicException('Operation not found: ' . $operationName); # todo change this to be more helpful
        }
        if (!$operation->getChannel()) {
            throw new LogicException('Operation does not have a channel defined'); # todo change this to be more helpful
        }
        $channel = $operation->resolveChannel($this->configuration->getSpec());
        $serverName ??= $this->specRepo->getDefaultServerNameForChannel($this->configuration->getSpec(), $channel);

        foreach ($operation->resolveMessages($this->configuration->getSpec()) as $operationMessage) {
            if ($operationMessage->getName() === $message::getMessageName()) {
                $messageSpec = $operationMessage;
                break;
            }
        }
        if (!isset($messageSpec)) {
            throw new LogicException(sprintf(
                'Message "%s" not found in operation "%s"',
                $message::getMessageName(),
                $operationName,
            )); # todo change this to be more helpful
        }

        $contentType = $messageSpec->getContentType() ?? $this->configuration->getSpec()->getDefaultContentType();

        $this->adapterManager
            ->resolveAdapter(
                $this->configuration->getSpec(),
                $this->specRepo->getServerForChannel($this->configuration->getSpec(), $channel, $serverName),
                $this->configuration->getCredentials($serverName),
            )
            ->publishMessage(
                $operation,
                $messageSpec,
                $this->serializer->serialize($contentType, $message),
                $contentType,
                $message->getHeaders(),
            )
        ;
    }
}
