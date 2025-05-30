<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive;

use LogicException;
use Siemendev\AsyncapiPhp\Configuration\Configuration;
use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Serializer\SerializationHandler;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Exception\ReferenceNotFoundException;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\SpecRepository;
use Siemendev\AsyncapiPhp\Spec\ReferenceResolver;

class MessageMapper
{
    private SpecRepository $specRepository;

    private SerializationHandler $serializer;

    public function __construct(
        ?SpecRepository $specRepository = null,
        ?SerializationHandler $serializer = null,
    ) {
        $this->specRepository = $specRepository ?? new SpecRepository();
        $this->serializer = $serializer ?? new SerializationHandler();
    }

    public function setSpecRepository(SpecRepository $specRepository): self
    {
        $this->specRepository = $specRepository;

        return $this;
    }

    public function setSerializationHandler(SerializationHandler $serializer): self
    {
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * @param string|null $typeHint can be either FQCN, message name or spec reference
     * @throws InvalidSpecificationException
     * @throws SerializationException
     */
    public function mapMessage(
        Configuration $configuration,
        Operation $operation,
        string $payload,
        ?string $typeHint = null,
    ): MessageInterface {
        $specMessage = $this->detectMessage($operation, $typeHint);
        if ($specMessage instanceof Message) {
            return $this->serializer->deserialize(
                $specMessage->resolveContentType(),
                $payload,
                $configuration->getStub()->getMessageClass($specMessage),
            );
        }

        $messages = $operation->resolveMessages();
        if (count($messages) === 0) {
            $channel = $this->specRepository->getOperationChannel($operation);
            $messages = $channel->resolveMessages();
        }
        foreach ($messages as $message) {
            return $this->serializer->deserialize(
                $message->resolveContentType(),
                $payload,
                $configuration->getStub()->getMessageClass($message),
            );
        }

        throw new LogicException('No message found for operation');
    }

    /**
     * @param string|null $typeHint can be either FQCN, message name or spec reference
     * @throws InvalidSpecificationException
     */
    public function detectMessage(Operation $operation, ?string $typeHint = null): ?Message
    {
        $messages = $operation->resolveMessages();
        if (count($messages) === 0) {
            $channel = $this->specRepository->getOperationChannel($operation);
            $messages = $channel->resolveMessages();
        }
        if (count($messages) === 0) {
            throw new LogicException('No messages defined for operation');
        }

        // if there is only one message, return it (must be it, right?)
        if (count($messages) === 1) {
            return array_shift($messages);
        }

        // if the type hint is a FQCN, try to find the message with the same name
        if ($typeHint && class_exists($typeHint) && is_subclass_of($typeHint, MessageInterface::class)) {
            foreach ($messages as $message) {
                if ($message->getName() === $typeHint::getMessageName()) {
                    return $message;
                }
            }
        }

        // try to find the message by reference
        if ($typeHint && str_starts_with($typeHint, '#/')) {
            try {
                $reference = ReferenceResolver::resolveReference($operation, $typeHint);
                if (!$reference instanceof Message) {
                    throw new LogicException('Reference ' . $typeHint . ' does not point to a message');
                }

                return $reference;
            } catch (ReferenceNotFoundException) {
                // ignore
            }
        }

        // try to find the message with the same name
        foreach ($messages as $message) {
            if ($message->getName() === $typeHint) {
                return $message;
            }
        }

        return null;
    }
}
