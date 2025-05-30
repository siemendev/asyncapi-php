<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Model;

use Siemendev\AsyncapiPhp\Spec\Exception\ReferenceNotFoundException;
use Siemendev\AsyncapiPhp\Spec\ReferenceResolver;

/**
 * A simple object to allow referencing other components in the specification.
 * @template T of AsyncApiObject
 */
class Reference extends AsyncApiObject
{
    /** The reference string. */
    protected string $ref;

    /** A short summary which by default SHOULD override that of the referenced component. */
    protected ?string $summary = null;

    /** A description which by default SHOULD override that of the referenced component. */
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
     *
     * @return $this
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
     *
     * @return $this
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
     * @throws ReferenceNotFoundException
     */
    public function resolve(): AsyncApiObject
    {
        return ReferenceResolver::resolveReference($this->getRootElement(), $this->getRef());  // @phpstan-ignore-line
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
