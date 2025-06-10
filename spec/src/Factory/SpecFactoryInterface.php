<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec\Factory;

use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Factory\Exception\SpecFactoryException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;

interface SpecFactoryInterface
{
    /**
     * Create an AsyncApi object from a JSON string.
     *
     * @param string $json The JSON string containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the JSON is invalid or cannot be parsed
     */
    public function fromJson(string $json): AsyncApi;

    /**
     * Static method for DX, @see self::fromJson().
     *
     * @param string $json The JSON string containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the JSON is invalid or cannot be parsed
     */
    public static function createSpecFromJson(string $json): AsyncApi;

    /**
     * Create an AsyncApi object from a JSON file.
     *
     * @param string $filePath The path to the JSON file containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the JSON is invalid or cannot be parsed
     */
    public function fromJsonFile(string $filePath): AsyncApi;

    /**
     * Static method for DX, @see self::fromJsonFile().
     *
     * @param string $filePath The path to the JSON file containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the JSON is invalid or cannot be parsed
     */
    public static function createSpecFromJsonFile(string $filePath): AsyncApi;

    /**
     * Create an AsyncApi object from a YAML string.
     *
     * @param string $yaml The YAML string containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the YAML is invalid or cannot be parsed
     */
    public function fromYaml(string $yaml): AsyncApi;

    /**
     * Static method for DX, @see self::fromYaml().
     *
     * @param string $yaml The YAML string containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the YAML is invalid or cannot be parsed
     */
    public static function createSpecFromYaml(string $yaml): AsyncApi;

    /**
     * Create an AsyncApi object from a YAML file.
     *
     * @param string $filePath The path to the YAML file containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws SpecFactoryException If the file is not found or cannot be read
     * @throws InvalidSpecificationException
     */
    public function fromYamlFile(string $filePath): AsyncApi;

    /**
     * Static method for DX, @see self::fromYamlFile().
     *
     * @param string $filePath The path to the YAML file containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws SpecFactoryException If the file is not found or cannot be read
     * @throws InvalidSpecificationException
     */
    public static function createSpecFromYamlFile(string $filePath): AsyncApi;

    /**
     * Create an AsyncApi object from a file, automatically detecting the format based on the file extension.
     *
     * @param string $filePath The path to the file containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the file format is unsupported or cannot be read
     */
    public function fromFile(string $filePath): AsyncApi;

    /**
     * Static method for DX, @see self::fromFile().
     *
     * @param string $filePath The path to the file containing the AsyncAPI specification
     * @return AsyncApi The AsyncApi object
     * @throws InvalidSpecificationException
     * @throws SpecFactoryException If the file format is unsupported or cannot be read
     */
    public static function createSpecFromFile(string $filePath): AsyncApi;
}
