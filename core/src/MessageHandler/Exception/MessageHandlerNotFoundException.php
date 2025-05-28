<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\MessageHandler\Exception;

use LogicException;

class MessageHandlerNotFoundException extends LogicException
{
    public function __construct(string $messageClass)
    {
        parent::__construct(sprintf('Message handler for "%s" not found', $messageClass));
    }
}
