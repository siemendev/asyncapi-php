<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Exception;

use Throwable;

/**
 * Base interface for all AsyncApiPhp exceptions.
 *
 * This interface extends the Throwable interface, allowing it to be used
 * as a base type for all exceptions thrown by the AsyncApiPhp library.
 *
 * Each package should create its own exception interface that implement this interface creating a clear hierarchy.
 */
interface AsyncApiPhpException extends Throwable {}
