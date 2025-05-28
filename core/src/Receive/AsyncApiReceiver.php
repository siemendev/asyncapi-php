<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Receive;

use Siemendev\AsyncapiPhp\Configuration\Configuration;
use LogicException;

class AsyncApiReceiver extends AbstractAsyncApiReceiver
{
    public function receiveMessages(Configuration $configuration, string $operationName, ?string $serverName = null): void
    {
        throw new LogicException('Not implemented yet');
    }
}
