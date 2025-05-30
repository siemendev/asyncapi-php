<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Exception;

use Exception;

class ReferenceNotFoundException extends Exception
{
    public function __construct(string $ref)
    {
        parent::__construct(sprintf('Reference "%s" not found', $ref));
    }
}
