<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Configuration;

use Siemendev\AsyncapiPhp\Message\MessageInterface;
use Siemendev\AsyncapiPhp\Spec\Model\Message;

class StubConfiguration
{
    public const MESSAGE_CLASS_SUFFIX = 'Message';

    private string $path;

    private string $namespace;

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * @return class-string<MessageInterface>
     */
    public function getMessageClass(Message $message): string
    {
        return $this->getNamespace() . '\\' . $this->getClassName($message); // @phpstan-ignore-line
    }

    public function getClassName(Message $message): string
    {
        return ucfirst($message->getName() ?: '') . self::MESSAGE_CLASS_SUFFIX;
    }
}
