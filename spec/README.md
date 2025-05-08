# AsyncAPI PHP Specification

This library provides a set of PHP classes that represent the AsyncAPI specification v3.0.0.
It allows you to build AsyncAPI documents programmatically using fully typed objects instead of arrays.

## Features

- PHP 8.4 compatible with strong typing
- Fluent interface with getters and setters for all properties
- Complete implementation of the AsyncAPI specification v3.0.0

## Directory Structure

- `src/Model/`: Contains all the AsyncAPI specification model classes
- `src/Util/`: Contains utility classes like serializers
- `demo/`: Contains example code and demo implementations

## Installation

This library is part of the Siemendev AsyncAPI PHP package. It's already included in the project, so no additional installation is required.

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

You can also run the `generate_asyncapi.php` script to generate a sample AsyncAPI document and save it to a file:

```bash
php backend/src/spec/Demo/generate_asyncapi.php
```

## Model Classes

The library includes the following model classes in the `Siemendev\AsyncapiPhp\Spec\Model` namespace:

- `AsyncApiObject`: Base class for all AsyncAPI specification objects
- `AsyncApi`: The root AsyncAPI document
- `Info`: General information about the API
- `Contact`: Contact information for the exposed API
- `License`: License information for the exposed API
- `Server`: An object representing a server
- `ServerVariable`: An object representing a server variable
- `Channel`: Describes a named network address where messages can be exchanged
- `ChannelOperation`: Describes an operation available on a channel
- `Operation`: Describes an operation that can be performed on a channel
- `Message`: Describes a message that can be published or received on a channel
- `MessageExample`: Provides an example of a message
- `MessageTrait`: Describes a trait that can be applied to a message
- `OperationTrait`: Describes a trait that can be applied to an operation
- `Parameter`: Describes a parameter included in a channel address
- `Schema`: Defines the structure of data
- `Reference`: A simple object to allow referencing other components in the specification
- `Components`: Holds a set of reusable objects for different aspects of the AsyncAPI specification
- `SecurityScheme`: Defines a security scheme that can be used by the operations
- `SecurityRequirement`: Lists the required security schemes to execute an operation
- `OAuthFlows`: Allows configuration of the supported OAuth Flows
- `OAuthFlow`: Configuration details for a supported OAuth Flow
- `CorrelationId`: An object that specifies an identifier at design time that can be used to correlate one message with another
- `Discriminator`: Used to aid in serialization, deserialization, and validation of a polymorphic schema
- `ExternalDocumentation`: Allows referencing an external resource for extended documentation
- `Tag`: Adds metadata to a single tag that is used by the Operation Object

## Demo Classes

The library includes the following demo classes in the `Siemendev\AsyncapiPhp\Spec\Demo` namespace:

- `Example`: Provides basic example usage of the AsyncAPI specification classes
- `CompleteAsyncApiDemo`: Provides a comprehensive example of a complete AsyncAPI specification for an event-driven e-commerce API
- `generate_asyncapi.php`: Script to generate a basic sample AsyncAPI document
- `generate_complete_asyncapi.php`: Script to generate a comprehensive AsyncAPI document

### Running the Complete Demo

To generate a complete AsyncAPI specification for an event-driven e-commerce API, run:

```bash
php backend/src/spec/Demo/generate_complete_asyncapi.php
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
