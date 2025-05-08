<?php

namespace Siemendev\AsyncapiPhp\Serializer;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Serializer\Exception\SerializationException;

interface SerializerInterface
{
    public static function getFormat(): string;

    /**
     * @return string json string
     * @throws SerializationException
     */
    public function serialize(MessageInterface $message): string;

    /**
     * @param class-string<MessageInterface> $messageClass
     * @param string $messageData json string
     * @throws SerializationException
     */
    public function deserialize(string $messageClass, string $messageData): MessageInterface;
}
