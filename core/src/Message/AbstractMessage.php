<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Message;

abstract class AbstractMessage implements MessageInterface
{
    use MessageHeadersTrait;
}
