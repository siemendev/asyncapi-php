<?php

namespace Siemendev\AsyncapiPhp\Receive;

use Siemendev\AsyncapiPhp\Configuration\Configuration;

class AsyncApiReceiver extends AbstractAsyncApiReceiver
{
    public function receiveMessages(Configuration $configuration, string $operationName, ?string $serverName = null): void
    {
        throw new \LogicException('Not implemented yet');
    }
}
