<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Factory;

use Siemendev\AsyncapiPhp\Spec\Factory\Exception\SpecFactoryException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

/**
 * Factory for creating AsyncApi objects from various formats.
 */
class SpecFactory extends AbstractSpecFactory
{
    use StaticSpecFactoryTrait;

    public function fromJson(string $json): AsyncApi
    {
        return $this->jsonSpecSerializer->fromJson($json);
    }

    public function fromJsonFile(string $filePath): AsyncApi
    {
        if (!file_exists($filePath)) {
            throw new SpecFactoryException('File not found: ' . $filePath);
        }

        $json = file_get_contents($filePath);

        if ($json === false) {
            throw new SpecFactoryException('Failed to read file: ' . $filePath);
        }

        return $this->fromJson($json);
    }

    public function fromYaml(string $yaml): AsyncApi
    {
        return $this->yamlSpecSerializer->fromYaml($yaml);
    }

    public function fromYamlFile(string $filePath): AsyncApi
    {
        if (!file_exists($filePath)) {
            throw new SpecFactoryException('File not found: ' . $filePath);
        }

        $yaml = file_get_contents($filePath);

        if ($yaml === false) {
            throw new SpecFactoryException('Failed to read file: ' . $filePath);
        }

        return $this->fromYaml($yaml);
    }

    public function fromFile(string $filePath): AsyncApi
    {
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        switch ($extension) {
            case 'json':
                return $this->fromJsonFile($filePath);
            case 'yaml':
            case 'yml':
                return $this->fromYamlFile($filePath);
            default:
                throw new SpecFactoryException('Unsupported file format: ' . $extension); // todo use specific exception
        }
    }
}
