<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\MessageHandler;

use Siemendev\AsyncapiPhp\Message\MessageInterface;

/**
 * @template T of MessageInterface
 */
interface MessageHandlerInterface
{
    /**
     * @return class-string<T>
     */
    public function getMessageClass(): string;

    /**
     * @param T $message
     */
    public function handle(MessageInterface $message): void;
}
