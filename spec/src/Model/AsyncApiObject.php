<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

use InvalidArgumentException;
use JsonSerializable;
use LogicException;

/**
 * Base class for all AsyncAPI specification objects.
 *
 * This class provides common functionality for all AsyncAPI specification objects,
 * including serialization to array and handling of extensions.
 */
abstract class AsyncApiObject implements JsonSerializable
{
    private ?AsyncApiObject $parentElement = null;

    /**
     * Specification extensions.
     *
     * @var array<string, scalar|AsyncApiObject|null>
     */
    protected array $extensions = [];

    /**
     * Convert the object to an array representation.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $array = [];

        // Add all properties
        foreach (get_object_vars($this) as $property => $value) {
            if (in_array($property, ['extensions', 'parentElement'], true)) {
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
     *
     * @param array<array-key, mixed> $array
     * @return array<array-key, mixed>
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
     * @param scalar|AsyncApiObject|null $value
     * @return $this
     *
     * @throws InvalidArgumentException If the extension name doesn't start with 'x-'
     */
    public function addExtension(string $name, mixed $value): self
    {
        if (!str_starts_with($name, 'x-')) {
            throw new InvalidArgumentException('Extension names must start with "x-"');
        }

        $this->extensions[$name] = $value;

        return $this;
    }

    /**
     * Set all extensions.
     *
     * @param array<string, scalar|AsyncApiObject|null> $extensions
     * @return $this
     */
    public function setExtensions(array $extensions): self
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * @return $this
     */
    public function removeExtension(string $name): self
    {
        unset($this->extensions[$name]);

        return $this;
    }

    public function hasExtension(string $name): bool
    {
        return isset($this->extensions[$name]);
    }

    /**
     * @return scalar|AsyncApiObject|null
     */
    public function getExtension(string $name): mixed
    {
        return $this->extensions[$name] ?? null;
    }

    /**
     * Get all extensions.
     *
     * @return array<string, scalar|AsyncApiObject|null>
     */
    public function getExtensions(): array
    {
        return $this->extensions;
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function getRootElement(): AsyncApi
    {
        $element = $this->parentElement?->getRootElement() ?? $this;
        if (!$element instanceof AsyncApi) {
            throw new LogicException('Root element is not an AsyncApi object');
        }

        return $element;
    }

    protected function getParentElement(): ?AsyncApiObject
    {
        return $this->parentElement;
    }

    /**
     * @return $this
     */
    protected function setParentElement(AsyncApiObject $parent): self
    {
        $this->parentElement = $parent;

        return $this;
    }

    /**
     * Get a string representation of the object.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        $vars = get_object_vars($this);

        unset($vars['parentElement']);

        return $vars;
    }
}
