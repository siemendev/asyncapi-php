<?php

namespace Siemendev\AsyncapiPhp\Message;

trait MessageHeadersTrait
{
    /**
     * @var array<string|int, mixed>
     */
    private array $headers = [];

    public function setHeader(string|int $key, mixed $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * @param array<string|int, mixed> $headers
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    public function getHeader(string|int $key): mixed
    {
        return $this->headers[$key] ?? null;
    }

    /**
     * @return array<string|int, mixed>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function hasHeader(string|int $key): bool
    {
        return isset($this->headers[$key]);
    }

    public function removeHeader(string|int $key): self
    {
        unset($this->headers[$key]);

        return $this;
    }

    public function clearHeaders(): self
    {
        $this->headers = [];

        return $this;
    }
}