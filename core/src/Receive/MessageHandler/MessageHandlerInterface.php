<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive\MessageHandler;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception\MessageHandlerErrorException;
use Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception\MessageHandlerFailedException;

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
     * @throws MessageHandlerFailedException if the message could not be handled (does not stop the worker)
     * @throws MessageHandlerErrorException (or any other exception) -> something bad happened (stops the worker)
     */
    public function handle(MessageInterface $message): void;
}
