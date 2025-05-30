<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Serializer;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;
use LogicException;

class SerializationHandler
{
    /** @var array<string, SerializerInterface> */
    private array $serializers = [];

    public function addSerializer(SerializerInterface $serializer): self
    {
        if (isset($this->serializers[$serializer::getFormat()])) {
            throw new LogicException('There is already a serializer for format ' . $serializer::getFormat() . ' registered.');
        }

        $this->serializers[$serializer::getFormat()] = $serializer;

        return $this;
    }

    /**
     * @throws SerializationException
     */
    public function serialize(string $format, MessageInterface $message): string
    {
        if (!isset($this->serializers[$format])) {
            throw new LogicException('No serializer found for format "' . $format . '"');
        }

        return $this->serializers[$format]->serialize($message);
    }

    /**
     * @template T of MessageInterface
     * @param class-string<T> $messageClass
     * @throws SerializationException
     */
    public function deserialize(string $format, string $messageData, string $messageClass): MessageInterface
    {
        if (!isset($this->serializers[$format])) {
            throw new LogicException('No serializer found for format "' . $format . '"');
        }

        return $this->serializers[$format]->deserialize($messageClass, $messageData);
    }
}
