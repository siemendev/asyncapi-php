<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Exception;

use Exception;

class MessagePublishFailedException extends Exception implements AsyncApiPhpAdapterException {}
