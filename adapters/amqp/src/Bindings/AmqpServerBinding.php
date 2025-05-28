<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Adapter\Amqp\Bindings;

use Siemendev\AsyncapiPhp\Spec\Model\Bindings\ServerBinding;

/**
 * AMQP Server Binding Object.
 *
 * This object MUST NOT contain any properties. Its name is reserved for future use.
 *
 * @see https://github.com/asyncapi/bindings/blob/master/amqp/README.md#server-binding-object
 */
class AmqpServerBinding extends ServerBinding {}
