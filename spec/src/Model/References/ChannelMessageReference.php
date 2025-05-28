<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model\References;

use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;

/**
 * @extends Reference<Message>
 */
class ChannelMessageReference extends Reference
{
    public function __construct(string $channelName, string $messageName)
    {
        parent::__construct(sprintf(
            '#/channels/%s/messages/%s',
            $channelName,
            $messageName,
        ));
    }
}
