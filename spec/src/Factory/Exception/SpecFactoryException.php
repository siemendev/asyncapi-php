<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Factory\Exception;

use Exception;
use Siemendev\AsyncapiPhp\Spec\Exception\AsyncApiPhpSpecException;

class SpecFactoryException extends Exception implements AsyncApiPhpSpecException {}
