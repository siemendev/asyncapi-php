<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception;

use LogicException;
use Siemendev\AsyncapiPhp\Receive\Exception\AsyncApiPhpReceiveException;

class MessageHandlerNotFoundException extends LogicException implements AsyncApiPhpReceiveException
{
    public function __construct(string $messageClass)
    {
        parent::__construct(sprintf('Message handler for "%s" not found', $messageClass));
    }
}
