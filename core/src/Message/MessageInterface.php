<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Message;

interface MessageInterface
{
    public static function getMessageName(): string;

    /**
     * @return array<string, scalar|null>
     */
    public function getHeaders(): array;

    /**
     * @param scalar|null $value
     */
    public function setHeader(string $key, mixed $value): self;
}
