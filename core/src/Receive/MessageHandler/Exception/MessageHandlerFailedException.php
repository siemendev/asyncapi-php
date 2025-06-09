<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive\MessageHandler\Exception;

use Exception;
use Siemendev\AsyncapiPhp\Receive\Exception\AsyncApiPhpReceiveException;

class MessageHandlerFailedException extends Exception implements AsyncApiPhpReceiveException {}
