<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Base class for all AsyncAPI specification objects.
 * 
 * This class provides common functionality for all AsyncAPI specification objects,
 * including serialization to array and handling of extensions.
 */
abstract class AsyncApiObject implements \JsonSerializable
{
    /**
     * Specification extensions.
     */
    protected array $extensions = [];

    /**
     * Convert the object to an array representation.
     */
    public function toArray(): array
    {
        $array = [];

        // Add all properties
        foreach (get_object_vars($this) as $property => $value) {
            if ($property === 'extensions') {
                continue;
            }

            if ($value !== null) {
                $key = $this->getSerializedPropertyName($property);

                if (is_object($value) && method_exists($value, 'toArray')) {
                    $array[$key] = $value->toArray();
                } elseif (is_array($value)) {
                    $array[$key] = $this->processArrayValue($value);
                } else {
                    $array[$key] = $value;
                }
            }
        }

        // Add extensions
        foreach ($this->extensions as $key => $value) {
            $array[$key] = $value;
        }

        return $array;
    }

    /**
     * Process array values for serialization.
     */
    protected function processArrayValue(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_object($value) && method_exists($value, 'toArray')) {
                $result[$key] = $value->toArray();
            } elseif (is_array($value)) {
                $result[$key] = $this->processArrayValue($value);
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Get the serialized name of a property.
     */
    protected function getSerializedPropertyName(string $property): string
    {
        return $property;
    }

    /**
     * Add a specification extension.
     *
     * @throws \InvalidArgumentException If the extension name doesn't start with 'x-'
     */
    public function addExtension(string $name, mixed $value): self
    {
        if (!str_starts_with($name, 'x-')) {
            throw new \InvalidArgumentException('Extension names must start with "x-"');
        }

        $this->extensions[$name] = $value;
        return $this;
    }

    /**
     * Set all extensions.
     */
    public function setExtensions(array $extensions): self
    {
        $this->extensions = $extensions;
        return $this;
    }

    /**
     * Get all extensions.
     */
    public function getExtensions(): array
    {
        return $this->extensions;
    }

    /**
     * Specify data which should be serialized to JSON.
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
