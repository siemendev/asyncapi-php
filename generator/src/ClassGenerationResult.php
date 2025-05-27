<?php

namespace Siemendev\AsyncapiPhp\Generator;

use Nette\PhpGenerator\PhpFile;

class ClassGenerationResult
{
    /** @var array<string, PhpFile> key is filename, value is class */
    private array $files = [];

    /**
     * @return array<string, PhpFile> key is filename, value is class
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    public function getFile(string $filename): ?PhpFile
    {
        return $this->files[$filename] ?? null;
    }

    public function addFile(string $filename, PhpFile $file): self
    {
        $this->files[$filename] = $file;

        return $this;
    }
}
