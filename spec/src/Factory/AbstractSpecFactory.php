<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Factory;

use Siemendev\AsyncapiPhp\Spec\Serializer\JsonSpecSerializer;
use Siemendev\AsyncapiPhp\Spec\Serializer\YamlSpecSerializer;

abstract class AbstractSpecFactory implements SpecFactoryInterface
{
    protected JsonSpecSerializer $jsonSpecSerializer;

    protected YamlSpecSerializer $yamlSpecSerializer;

    public function __construct(
        ?JsonSpecSerializer $jsonSpecSerializer = null,
        ?YamlSpecSerializer $yamlFactory = null,
    ) {
        $this->jsonSpecSerializer = $jsonSpecSerializer ?? new JsonSpecSerializer();
        $this->yamlSpecSerializer = $yamlFactory ?? new YamlSpecSerializer();
    }

    public function setJsonSpecFactory(JsonSpecSerializer $jsonSpecSerializer): self
    {
        $this->jsonSpecSerializer = $jsonSpecSerializer;

        return $this;
    }

    public function setYamlSpecFactory(YamlSpecSerializer $yamlSpecSerializer): self
    {
        $this->yamlSpecSerializer = $yamlSpecSerializer;

        return $this;
    }
}
