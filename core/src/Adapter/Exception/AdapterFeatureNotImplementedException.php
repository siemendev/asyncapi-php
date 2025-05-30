<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Exception;

use LogicException;

class AdapterFeatureNotImplementedException extends LogicException
{
    public function __construct(string $feature)
    {
        parent::__construct(sprintf('Feature "%s" not implemented for this adapter', $feature));
    }
}
