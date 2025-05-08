<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * The Schema Object allows the definition of input and output data types.
 * 
 * These types can be objects, but also primitives and arrays.
 * This object is a JSON Schema dialect that is a superset of JSON Schema Specification Draft 2020-12.
 */
class Schema extends AsyncApiObject
{
    /**
     * The type of the schema.
     *
     * @var string|null
     */
    protected $type;
    
    /**
     * The title of the schema.
     *
     * @var string|null
     */
    protected $title;
    
    /**
     * A short description of the schema.
     *
     * @var string|null
     */
    protected $description;
    
    /**
     * The default value of the schema.
     *
     * @var mixed
     */
    protected $default;
    
    /**
     * The format of the schema.
     *
     * @var string|null
     */
    protected $format;
    
    /**
     * The minimum value of the schema.
     *
     * @var int|float|null
     */
    protected $minimum;
    
    /**
     * The maximum value of the schema.
     *
     * @var int|float|null
     */
    protected $maximum;
    
    /**
     * Whether the minimum value is exclusive.
     *
     * @var bool|null
     */
    protected $exclusiveMinimum;
    
    /**
     * Whether the maximum value is exclusive.
     *
     * @var bool|null
     */
    protected $exclusiveMaximum;
    
    /**
     * The minimum length of the schema.
     *
     * @var int|null
     */
    protected $minLength;
    
    /**
     * The maximum length of the schema.
     *
     * @var int|null
     */
    protected $maxLength;
    
    /**
     * The pattern of the schema.
     *
     * @var string|null
     */
    protected $pattern;
    
    /**
     * The minimum number of items in the schema.
     *
     * @var int|null
     */
    protected $minItems;
    
    /**
     * The maximum number of items in the schema.
     *
     * @var int|null
     */
    protected $maxItems;
    
    /**
     * Whether the items in the schema must be unique.
     *
     * @var bool|null
     */
    protected $uniqueItems;
    
    /**
     * The minimum number of properties in the schema.
     *
     * @var int|null
     */
    protected $minProperties;
    
    /**
     * The maximum number of properties in the schema.
     *
     * @var int|null
     */
    protected $maxProperties;
    
    /**
     * The required properties of the schema.
     *
     * @var array<string>|null
     */
    protected $required;
    
    /**
     * The enum values of the schema.
     *
     * @var array|null
     */
    protected $enum;
    
    /**
     * The type of the items in the schema.
     *
     * @var Schema|Reference|null
     */
    protected $items;
    
    /**
     * The all-of schemas.
     *
     * @var array<Schema|Reference>|null
     */
    protected $allOf;
    
    /**
     * The one-of schemas.
     *
     * @var array<Schema|Reference>|null
     */
    protected $oneOf;
    
    /**
     * The any-of schemas.
     *
     * @var array<Schema|Reference>|null
     */
    protected $anyOf;
    
    /**
     * The not schema.
     *
     * @var Schema|Reference|null
     */
    protected $not;
    
    /**
     * The properties of the schema.
     *
     * @var array<string, Schema|Reference>|null
     */
    protected $properties;
    
    /**
     * The additional properties of the schema.
     *
     * @var bool|Schema|Reference|null
     */
    protected $additionalProperties;
    
    /**
     * The discriminator of the schema.
     *
     * @var Discriminator|null
     */
    protected $discriminator;
    
    /**
     * Whether the schema is read only.
     *
     * @var bool|null
     */
    protected $readOnly;
    
    /**
     * Whether the schema is write only.
     *
     * @var bool|null
     */
    protected $writeOnly;
    
    /**
     * The examples of the schema.
     *
     * @var array|null
     */
    protected $examples;
    
    /**
     * Get the type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    
    /**
     * Set the type.
     *
     * @param string $type The type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
    
    /**
     * Get the title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    /**
     * Set the title.
     *
     * @param string $title The title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
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
     * Get the default value.
     *
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }
    
    /**
     * Set the default value.
     *
     * @param mixed $default The default value
     * @return $this
     */
    public function setDefault($default): self
    {
        $this->default = $default;
        return $this;
    }
    
    /**
     * Get the format.
     *
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }
    
    /**
     * Set the format.
     *
     * @param string $format The format
     * @return $this
     */
    public function setFormat(string $format): self
    {
        $this->format = $format;
        return $this;
    }
    
    /**
     * Get the properties.
     *
     * @return array<string, Schema|Reference>|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }
    
    /**
     * Set the properties.
     *
     * @param array<string, Schema|Reference> $properties The properties
     * @return $this
     */
    public function setProperties(array $properties): self
    {
        $this->properties = $properties;
        return $this;
    }
    
    /**
     * Add a property.
     *
     * @param string $name The property name
     * @param Schema|Reference $property The property
     * @return $this
     */
    public function addProperty(string $name, $property): self
    {
        if ($this->properties === null) {
            $this->properties = [];
        }
        
        $this->properties[$name] = $property;
        return $this;
    }
    
    /**
     * Get the required properties.
     *
     * @return array<string>|null
     */
    public function getRequired(): ?array
    {
        return $this->required;
    }
    
    /**
     * Set the required properties.
     *
     * @param array<string> $required The required properties
     * @return $this
     */
    public function setRequired(array $required): self
    {
        $this->required = $required;
        return $this;
    }
    
    /**
     * Add a required property.
     *
     * @param string $property The required property
     * @return $this
     */
    public function addRequired(string $property): self
    {
        if ($this->required === null) {
            $this->required = [];
        }
        
        $this->required[] = $property;
        return $this;
    }
    
    /**
     * Get the items.
     *
     * @return Schema|Reference|null
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * Set the items.
     *
     * @param Schema|Reference $items The items
     * @return $this
     */
    public function setItems($items): self
    {
        $this->items = $items;
        return $this;
    }
    
    /**
     * Get the enum values.
     *
     * @return array|null
     */
    public function getEnum(): ?array
    {
        return $this->enum;
    }
    
    /**
     * Set the enum values.
     *
     * @param array $enum The enum values
     * @return $this
     */
    public function setEnum(array $enum): self
    {
        $this->enum = $enum;
        return $this;
    }
}