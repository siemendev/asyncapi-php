<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model\References;

use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;

/**
 * @extends Reference<Message>
 */
class ComponentMessageReference extends Reference
{
    public function __construct(string $messageName)
    {
        parent::__construct(sprintf(
            '#/components/messages/%s',
            $messageName,
        ));
    }
}
