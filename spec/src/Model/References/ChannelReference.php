<?php

namespace Siemendev\AsyncapiPhp\Spec\Model\References;

use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;

/**
 * @extends Reference<Channel>
 */
class ChannelReference extends Reference
{
    public function __construct(string $channelName)
    {
        parent::__construct(sprintf(
            '#/channels/%s',
            $channelName,
        ));
    }
}
