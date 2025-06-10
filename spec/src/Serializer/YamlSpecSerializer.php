<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Serializer;

use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Factory\Exception\SpecFactoryException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

/**
 * Factory for creating AsyncApi objects from YAML.
 *
 * TODO switch the yaml package dependency to "suggested" and handle possible missing package here
 *
 * @internal
 */
class YamlSpecSerializer
{
    /**
     * Create an AsyncApi object from a YAML string.
     *
     * @param string $yaml The YAML string containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws SpecFactoryException If the YAML is invalid
     * @throws InvalidSpecificationException
     */
    public function fromYaml(string $yaml): AsyncApi
    {
        try {
            $data = Yaml::parse($yaml);
        } catch (ParseException $e) {
            throw new SpecFactoryException('Invalid YAML: ' . $e->getMessage(), previous: $e);
        }

        if (!is_array($data)) {
            throw new SpecFactoryException('Invalid YAML: invalid yaml format');
        }

        return AsyncApi::createFromArray($data);
    }
}
