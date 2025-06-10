# AsyncAPI PHP Specification

This library provides a set of PHP classes that represent the AsyncAPI specification v3.0.0.
It allows you to build AsyncAPI documents programmatically using fully typed objects instead of arrays.

## Features

- PHP 8.2+ compatible with strong typing
- Fluent interface with getters and setters for all properties
- Complete implementation of the AsyncAPI specification v3.0.0
- Reference resolution for components and other reusable objects

## Directory Structure

- `src/Model/`: Contains all the AsyncAPI specification model classes
- `src/Model/Bindings/`: Contains binding-specific model classes
- `src/Model/References/`: Contains reference implementation classes
- `src/Exception/`: Contains exception classes for error handling
- `src/ReferenceResolver.php`: Utility class for resolving references within the specification
- `demo/`: Contains example code and demo implementations
- `tests/`: Contains integration tests

## Installation

```bash
composer require siemendev/asyncapi-php-spec
```

This library is part of the Siemendev AsyncAPI PHP package. It can be used standalone or as part of the complete AsyncAPI PHP solution.

## Usage

### Creating an AsyncAPI Document

```php
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\Info;

// Create the Info object
$info = new Info('My API', '1.0.0');
$info->setDescription('This is my API');

// Create the AsyncAPI object
$asyncApi = new AsyncApi($info);
$asyncApi->setId('urn:example:asyncapi');
$asyncApi->setDefaultContentType('application/json');

// Add more components to the AsyncAPI object...

echo json_encode($asyncApi);
```

### Example

See the `Example` class for a complete example of how to create an AsyncAPI document with channels, operations, messages, and schemas.

```php
use Siemendev\AsyncapiPhp\Spec\Demo\Example;

// Create a sample AsyncAPI document
$asyncApi = Example::createSampleSpec();

// Generate JSON
$json = Example::generate();
```

You can also run the example scripts to generate sample AsyncAPI documents:

```bash
php spec/demo/generate_asyncapi.php
php spec/demo/generate_complete_asyncapi.php
```

## Model Classes

The library includes the following model classes in the `Siemendev\AsyncapiPhp\Spec\Model` namespace:

### Core Classes
- `AsyncApiObject`: Base class for all AsyncAPI specification objects
- `AsyncApi`: The root AsyncAPI document
- `Info`: General information about the API
- `Contact`: Contact information for the exposed API
- `License`: License information for the exposed API

### Server and Channel Classes
- `Server`: An object representing a server
- `ServerVariable`: An object representing a server variable
- `Channel`: Describes a named network address where messages can be exchanged
- `ChannelOperation`: Describes an operation available on a channel
- `Parameter`: Describes a parameter included in a channel address

### Operation Classes
- `Operation`: Describes an operation that can be performed on a channel
- `OperationTrait`: Describes a trait that can be applied to an operation
- `OperationReply`: Describes a reply to an operation
- `OperationReplyAddress`: Describes the address for a reply

### Message Classes
- `Message`: Describes a message that can be published or received on a channel
- `MessageExample`: Provides an example of a message
- `MessageTrait`: Describes a trait that can be applied to a message
- `CorrelationId`: An object that specifies an identifier at design time that can be used to correlate one message with another

### Schema and Reference Classes
- `Schema`: Defines the structure of data
- `Reference`: A simple object to allow referencing other components in the specification
- `Discriminator`: Used to aid in serialization, deserialization, and validation of a polymorphic schema

### Security Classes
- `SecurityScheme`: Defines a security scheme that can be used by the operations
- `SecurityRequirement`: Lists the required security schemes to execute an operation
- `OAuthFlows`: Allows configuration of the supported OAuth Flows
- `OAuthFlow`: Configuration details for a supported OAuth Flow

### Other Classes
- `Components`: Holds a set of reusable objects for different aspects of the AsyncAPI specification
- `ExternalDocumentation`: Allows referencing an external resource for extended documentation
- `Tag`: Adds metadata to a single tag that is used by the Operation Object

## Bindings

The library supports various protocol-specific bindings in the `Siemendev\AsyncapiPhp\Spec\Model\Bindings` namespace. These allow you to define protocol-specific details for channels, operations, messages, and servers.

## Exception Handling

The library provides several exception classes in the `Siemendev\AsyncapiPhp\Spec\Exception` namespace:

- `AsyncApiPhpSpecException`: Base exception class for all AsyncAPI PHP Spec exceptions
- `InvalidSpecificationException`: Thrown when the specification is invalid
- `ReferenceNotFoundException`: Thrown when a reference cannot be resolved

## Reference Resolution

The `ReferenceResolver` class provides functionality to resolve references within the AsyncAPI specification. It can resolve references to components and other reusable objects.

## Demo Classes

The library includes the following demo classes in the `spec/demo` directory:

- `Example.php`: Provides basic example usage of the AsyncAPI specification classes
- `CompleteAsyncApiDemo.php`: Provides a comprehensive example of a complete AsyncAPI specification for an event-driven e-commerce API
- `generate_asyncapi.php`: Script to generate a basic sample AsyncAPI document
- `generate_complete_asyncapi.php`: Script to generate a comprehensive AsyncAPI document

### Running the Complete Demo

To generate a complete AsyncAPI specification for an event-driven e-commerce API, run:

```bash
php spec/demo/generate_complete_asyncapi.php
```

This will generate a comprehensive AsyncAPI specification that demonstrates the use of all the model classes in the library, including:

- Detailed metadata with Info, Contact, and License
- Multiple servers with variables, security, and tags
- Complex schemas for products and orders
- Message traits and operation traits
- Security schemes with OAuth flows
- Correlation IDs
- Multiple channels with parameters
- Various messages with examples
- Operations and references

## Documentation

For more information about the AsyncAPI specification, see the [AsyncAPI documentation](https://www.asyncapi.com/docs/reference/specification/v3.0.0).

## License

This library is licensed under the MIT License. See the LICENSE file for details.
