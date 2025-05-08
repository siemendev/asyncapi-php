<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * A simple object to allow referencing other components in the specification.
 */
class Reference extends AsyncApiObject
{
    /**
     * The reference string.
     *
     * @var string
     */
    protected $ref;
    
    /**
     * A short summary which by default SHOULD override that of the referenced component.
     *
     * @var string|null
     */
    protected $summary;
    
    /**
     * A description which by default SHOULD override that of the referenced component.
     *
     * @var string|null
     */
    protected $description;
    
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
     *
     * @return string
     */
    public function getRef(): string
    {
        return $this->ref;
    }
    
    /**
     * Get the summary.
     *
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }
    
    /**
     * Set the summary.
     *
     * @param string $summary The summary
     * @return $this
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }
    
    /**
     * Get the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    /**
     * Set the description.
     *
     * @param string $description The description
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
     * @return array
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