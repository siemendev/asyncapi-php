<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * A simple object to allow referencing other components in the specification.
 * @template T of AsyncApiObject
 */
class Reference extends AsyncApiObject
{
    /**
     * The reference string.
     */
    protected string $ref;

    /**
     * A short summary which by default SHOULD override that of the referenced component.
     */
    protected ?string $summary = null;

    /**
     * A description which by default SHOULD override that of the referenced component.
     */
    protected ?string $description = null;

    /**
     * Constructor.
     *
     * @param string $ref The reference string
     */
    public function __construct(string $ref)
    {
        $this->ref = $ref;
    }

    /**
     * Get the reference string.
     */
    public function getRef(): string
    {
        return $this->ref;
    }

    /**
     * Get the summary.
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * Set the summary.
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Get the description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the description.
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Convert the object to an array representation.
     *
     * @return array<string, string|null>
     */
    public function toArray(): array
    {
        $array = [
            '$ref' => $this->ref,
        ];

        if ($this->summary !== null) {
            $array['summary'] = $this->summary;
        }

        if ($this->description !== null) {
            $array['description'] = $this->description;
        }

        return $array;
    }

    /**
     * @return T
     */
    public function resolve(?string $model = null): AsyncApiObject
    {
        $ref = trim($this->getRef(), '#/');
        $parts = explode('/', $ref);

        $value = $this->getRootElement();
        foreach ($parts as $part) {
            if (is_object($value)) {
                if ($value instanceof Reference) {
                    $value = $value->resolve($model);
                }
                if ($value instanceof \ArrayAccess) {
                    if (!$value->offsetExists($part)) {
                        throw new \LogicException(sprintf('Reference "%s" not found in spec', $this->getRef()));
                    }
                    $value = $value[$part];
                    continue;
                }
                if (method_exists($value, 'get' . ucfirst($part))) {
                    $value = $value->{'get' . ucfirst($part)}();
                    continue;
                }
                if (property_exists($value, $part)) {
                    $value = $value->{$part};
                    continue;
                }
                throw new \LogicException(sprintf('Reference "%s" not found in spec', $this->getRef()));
            }

            if (is_array($value)) {
                if (!array_key_exists($part, $value)) {
                    throw new \LogicException(sprintf('Reference "%s" not found in spec', $this->getRef()));
                }
                $value = $value[$part];
                continue;
            }
        }

        if ($value instanceof Reference) {
            $value = $value->resolve($model);
        }

        if ($model && !($value instanceof $model)) {
            throw new \LogicException(sprintf('Reference "%s" is not of type %s', $this->getRef(), $model));
        }

        return $value;
    }

    /**
     * Get the serialized name of a property.
     *
     * @param string $property The property name
     * @return string The serialized property name
     */
    protected function getSerializedPropertyName(string $property): string
    {
        if ($property === 'ref') {
            return '$ref';
        }

        return parent::getSerializedPropertyName($property);
    }
}
