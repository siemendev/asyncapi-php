<?php

namespace Siemendev\AsyncapiPhp\MessageHandler\Exception;

class MessageHandlerNotFoundException extends \LogicException
{
    public function __construct(string $messageClass)
    {
        parent::__construct(sprintf('Message handler for "%s" not found', $messageClass));
    }
}
