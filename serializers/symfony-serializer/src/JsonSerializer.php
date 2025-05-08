<?php

namespace Siemendev\AsyncapiPhp\Serializer\Symfony;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use Siemendev\AsyncapiPhp\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface as SymfonySerializerInterface;

class JsonSerializer implements SerializerInterface
{
    private SymfonySerializerInterface $serializer;

    public static function getFormat(): string
    {
        return 'application/json';
    }

    public function __construct(
        SymfonySerializerInterface $serializer = null,
    ) {
        $this->serializer = $serializer ?? new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function serialize(MessageInterface $message): string
    {
        try {
            return $this->serializer->serialize($message, 'json');
        } catch (ExceptionInterface $e) {
            throw new SerializationException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function deserialize(string $messageClass, string $messageData): MessageInterface
    {
        try {
            return $this->serializer->deserialize($messageData, $messageClass, 'json');
        } catch (ExceptionInterface $e) {
            throw new SerializationException($e->getMessage(), $e->getCode(), $e);
        }
    }
}