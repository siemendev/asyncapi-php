<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Serializer;

use Siemendev\AsyncapiPhp\Spec\Factory\Exception\SpecFactoryException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use JsonException;

/**
 * Factory for creating AsyncApi objects from JSON.
 * @internal
 */
class JsonSpecSerializer
{
    /**
     * Create an AsyncApi object from a JSON string.
     *
     * @param string $json The JSON string containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws SpecFactoryException If the JSON is invalid
     * @throws InvalidSpecificationException
     */
    public function fromJson(string $json): AsyncApi
    {
        try {
            $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new SpecFactoryException('Invalid JSON: ' . $e->getMessage(), previous: $e);
        }

        if (!is_array($data)) {
            throw new SpecFactoryException('Invalid JSON: invalid json format');
        }

        return AsyncApi::createFromArray($data);
    }
}
