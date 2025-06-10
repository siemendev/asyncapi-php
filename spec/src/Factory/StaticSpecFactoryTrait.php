<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Factory;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

trait StaticSpecFactoryTrait
{
    public static function createSpecFromJson(string $json): AsyncApi
    {
        return (new self())->fromJson($json);
    }

    public static function createSpecFromJsonFile(string $filePath): AsyncApi
    {
        return (new self())->fromJsonFile($filePath);
    }

    public static function createSpecFromYaml(string $yaml): AsyncApi
    {
        return (new self())->fromYaml($yaml);
    }

    public static function createSpecFromYamlFile(string $filePath): AsyncApi
    {
        return (new self())->fromYamlFile($filePath);
    }

    public static function createSpecFromFile(string $filePath): AsyncApi
    {
        return (new self())->fromFile($filePath);
    }
}
