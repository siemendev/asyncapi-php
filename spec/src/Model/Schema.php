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
     */
    protected ?string $type = null;

    /**
     * The title of the schema.
     */
    protected ?string $title = null;

    /**
     * A short description of the schema.
     */
    protected ?string $description = null;

    /**
     * The default value of the schema.
     */
    protected mixed $default = null;

    /**
     * The format of the schema.
     */
    protected ?string $format = null;

    /**
     * The minimum value of the schema.
     */
    protected int|float|null $minimum = null;

    /**
     * The maximum value of the schema.
     */
    protected int|float|null $maximum = null;

    /**
     * Whether the minimum value is exclusive.
     */
    protected ?bool $exclusiveMinimum = null;

    /**
     * Whether the maximum value is exclusive.
     */
    protected ?bool $exclusiveMaximum = null;

    /**
     * The minimum length of the schema.
     */
    protected ?int $minLength = null;

    /**
     * The maximum length of the schema.
     */
    protected ?int $maxLength = null;

    /**
     * The pattern of the schema.
     */
    protected ?string $pattern = null;

    /**
     * The minimum number of items in the schema.
     */
    protected ?int $minItems = null;

    /**
     * The maximum number of items in the schema.
     */
    protected ?int $maxItems = null;

    /**
     * Whether the items in the schema must be unique.
     */
    protected ?bool $uniqueItems = null;

    /**
     * The minimum number of properties in the schema.
     */
    protected ?int $minProperties = null;

    /**
     * The maximum number of properties in the schema.
     */
    protected ?int $maxProperties = null;

    /**
     * The required properties of the schema.
     * 
     * @var array<string>|null
     */
    protected ?array $required = null;

    /**
     * The enum values of the schema.
     *
     * @var array<string>|null
     */
    protected ?array $enum = null;

    /**
     * The type of the items in the schema.
     *
     * @var Schema|Reference<Schema>|null
     */
    protected Schema|Reference|null $items = null;

    /**
     * The all-of schemas.
     * 
     * @var array<Schema|Reference<Schema>>|null
     */
    protected ?array $allOf = null;

    /**
     * The one-of schemas.
     * 
     * @var array<Schema|Reference<Schema>>|null
     */
    protected ?array $oneOf = null;

    /**
     * The any-of schemas.
     * 
     * @var array<Schema|Reference<Schema>>|null
     */
    protected ?array $anyOf = null;

    /**
     * The not schema.
     *
     * @var Schema|Reference<Schema>|null
     */
    protected Schema|Reference|null $not = null;

    /**
     * The properties of the schema.
     * 
     * @var array<string, Schema|Reference<Schema>>|null
     */
    protected ?array $properties = null;

    /**
     * The additional properties of the schema.
     *
     * @var bool|Schema|Reference<Schema>|null
     */
    protected bool|Schema|Reference|null $additionalProperties = null;

    /**
     * The discriminator of the schema.
     */
    protected ?Discriminator $discriminator = null;

    /**
     * Whether the schema is read only.
     */
    protected ?bool $readOnly = null;

    /**
     * Whether the schema is write only.
     */
    protected ?bool $writeOnly = null;

    /**
     * The examples of the schema.
     */
    protected ?array $examples = null;

    /**
     * Get the type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Set the type.
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the title.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the title.
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
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
     * Get the default value.
     */
    public function getDefault(): mixed
    {
        return $this->default;
    }

    /**
     * Set the default value.
     */
    public function setDefault(mixed $default): self
    {
        $this->default = $default;
        return $this;
    }

    /**
     * Get the format.
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * Set the format.
     */
    public function setFormat(string $format): self
    {
        $this->format = $format;
        return $this;
    }

    /**
     * Get the properties.
     *
     * @return array<string, Schema|Reference<Schema>>|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * Set the properties.
     *
     * @param array<string, Schema|Reference<Schema>> $properties
     */
    public function setProperties(array $properties): self
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * Add a property.
     *
     * @param Schema|Reference<Schema> $property
     */
    public function addProperty(string $name, Schema|Reference $property): self
    {
        if ($this->properties === null) {
            $this->properties = [];
        }

        $this->properties[$name] = $property->setParentElement($this);
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
     */
    public function setRequired(array $required): self
    {
        $this->required = $required;
        return $this;
    }

    /**
     * Add a required property.
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
     * @return Schema|Reference<Schema>|null
     */
    public function getItems(): Schema|Reference|null
    {
        return $this->items;
    }

    /**
     * Set the items.
     *
     * @param Schema|Reference<Schema> $items
     */
    public function setItems(Schema|Reference $items): self
    {
        $this->items = $items->setParentElement($this);
        return $this;
    }

    /**
     * Get the enum values.
     *
     * @return array<string>|null
     */
    public function getEnum(): ?array
    {
        return $this->enum;
    }

    /**
     * Set the enum values.
     *
     * @param array<string> $enum The enum values
     */
    public function setEnum(array $enum): self
    {
        $this->enum = $enum;
        return $this;
    }

    /**
     * Resolves the reference to the items and returns a Schema object.
     */
    public function resolveItems(): ?Schema
    {
        if ($this->items instanceof Reference) {
            return $this->items->resolve();
        }
        return $this->items;
    }

    /**
     * Resolves the references to the allOf schemas and returns an array of Schema objects.
     *
     * @return array<Schema>|null
     */
    public function resolveAllOf(): ?array
    {
        if ($this->allOf === null) {
            return null;
        }

        $schemas = [];
        foreach ($this->allOf as $schema) {
            if ($schema instanceof Reference) {
                $schemas[] = $schema->resolve();
            } else {
                $schemas[] = $schema;
            }
        }
        return $schemas;
    }

    /**
     * Resolves the references to the oneOf schemas and returns an array of Schema objects.
     *
     * @return array<Schema>|null
     */
    public function resolveOneOf(): ?array
    {
        if ($this->oneOf === null) {
            return null;
        }

        $schemas = [];
        foreach ($this->oneOf as $schema) {
            if ($schema instanceof Reference) {
                $schemas[] = $schema->resolve();
            } else {
                $schemas[] = $schema;
            }
        }
        return $schemas;
    }

    /**
     * Resolves the references to the anyOf schemas and returns an array of Schema objects.
     *
     * @return array<Schema>|null
     */
    public function resolveAnyOf(): ?array
    {
        if ($this->anyOf === null) {
            return null;
        }

        $schemas = [];
        foreach ($this->anyOf as $schema) {
            if ($schema instanceof Reference) {
                $schemas[] = $schema->resolve();
            } else {
                $schemas[] = $schema;
            }
        }
        return $schemas;
    }

    /**
     * Resolves the reference to the not schema and returns a Schema object.
     */
    public function resolveNot(): ?Schema
    {
        if ($this->not instanceof Reference) {
            return $this->not->resolve();
        }
        return $this->not;
    }

    /**
     * Resolves the references to the properties and returns an array of Schema objects.
     *
     * @return array<string, Schema>|null
     */
    public function resolveProperties(): ?array
    {
        if ($this->properties === null) {
            return null;
        }

        $properties = [];
        foreach ($this->properties as $name => $property) {
            if ($property instanceof Reference) {
                $properties[$name] = $property->resolve();
            } else {
                $properties[$name] = $property;
            }
        }
        return $properties;
    }

    /**
     * Resolves the reference to the additionalProperties and returns a Schema object or a boolean.
     *
     * @return bool|Schema|null
     */
    public function resolveAdditionalProperties(): bool|Schema|null
    {
        if ($this->additionalProperties instanceof Reference) {
            return $this->additionalProperties->resolve();
        }
        return $this->additionalProperties;
    }
}
