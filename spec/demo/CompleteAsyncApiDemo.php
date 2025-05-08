<?php

namespace Siemendev\AsyncapiPhp\Spec\Demo;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\ChannelOperation;
use Siemendev\AsyncapiPhp\Spec\Model\Components;
use Siemendev\AsyncapiPhp\Spec\Model\Contact;
use Siemendev\AsyncapiPhp\Spec\Model\CorrelationId;
use Siemendev\AsyncapiPhp\Spec\Model\Discriminator;
use Siemendev\AsyncapiPhp\Spec\Model\ExternalDocumentation;
use Siemendev\AsyncapiPhp\Spec\Model\Info;
use Siemendev\AsyncapiPhp\Spec\Model\License;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\MessageExample;
use Siemendev\AsyncapiPhp\Spec\Model\MessageTrait;
use Siemendev\AsyncapiPhp\Spec\Model\OAuthFlow;
use Siemendev\AsyncapiPhp\Spec\Model\OAuthFlows;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\OperationTrait;
use Siemendev\AsyncapiPhp\Spec\Model\Parameter;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;
use Siemendev\AsyncapiPhp\Spec\Model\Schema;
use Siemendev\AsyncapiPhp\Spec\Model\SecurityRequirement;
use Siemendev\AsyncapiPhp\Spec\Model\SecurityScheme;
use Siemendev\AsyncapiPhp\Spec\Model\Server;
use Siemendev\AsyncapiPhp\Spec\Model\ServerVariable;
use Siemendev\AsyncapiPhp\Spec\Model\Tag;

/**
 * A comprehensive demo that creates a complete AsyncAPI specification.
 * 
 * This demo showcases all the features of the AsyncAPI specification and
 * demonstrates how to use all the classes in the library.
 */
class CompleteAsyncApiDemo
{
    /**
     * Create a complete AsyncAPI specification.
     */
    public static function createCompleteSpec(): AsyncApi
    {
        // Create the Info object with detailed metadata
        $info = new Info('Event-Driven E-Commerce API', '1.0.0');
        $info->setDescription('A comprehensive event-driven API for e-commerce operations')
            ->setTermsOfService('https://example.com/terms');
        
        // Add contact information
        $contact = new Contact();
        $contact->setName('API Support Team')
            ->setUrl('https://example.com/support')
            ->setEmail('api-support@example.com');
        $info->setContact($contact);
        
        // Add license information
        $license = new License('Apache 2.0');
        $license->setUrl('https://www.apache.org/licenses/LICENSE-2.0.html');
        $info->setLicense($license);
        
        // Create the AsyncAPI object
        $asyncApi = new AsyncApi($info);
        $asyncApi->setId('urn:com:example:ecommerce:asyncapi')
            ->setDefaultContentType('application/json');
        
        // Add external documentation
        $externalDocs = new ExternalDocumentation('https://example.com/docs');
        $externalDocs->setDescription('Find more information about our API here');
        
        // Create servers
        $productionServer = new Server('api.example.com', 'mqtt');
        $productionServer->setDescription('Production MQTT server')
            ->setProtocolVersion('3.1.1')
            ->setExternalDocs($externalDocs);
        
        // Add server variables
        $portVariable = new ServerVariable('1883');
        $portVariable->setDescription('The port to connect to')
            ->setEnum(['1883', '8883'])
            ->setExamples(['1883']);
        $productionServer->addVariable('port', $portVariable);
        
        // Add security to server
        $securityRequirement = new SecurityRequirement();
        $securityRequirement->addRequirement('oauth2', ['read:products', 'write:orders']);
        $productionServer->addSecurity($securityRequirement);
        
        // Add server tags
        $serverTag = new Tag('production');
        $serverTag->setDescription('Production environment');
        $productionServer->addTag($serverTag);
        
        // Add the server to the AsyncAPI object
        $asyncApi->addServer('production', $productionServer);
        
        // Create a development server
        $devServer = new Server('dev-api.example.com', 'mqtt');
        $devServer->setDescription('Development MQTT server')
            ->setProtocolVersion('3.1.1');
        $asyncApi->addServer('development', $devServer);
        
        // Create components for reusable schemas
        $components = new Components();
        
        // Create schemas for common data structures
        $productSchema = new Schema();
        $productSchema->setType('object')
            ->setTitle('Product')
            ->setDescription('A product in the e-commerce system')
            ->setRequired(['id', 'name', 'price']);
        
        $productIdSchema = new Schema();
        $productIdSchema->setType('string')
            ->setDescription('The unique identifier for a product')
            ->setFormat('uuid');
        
        $productNameSchema = new Schema();
        $productNameSchema->setType('string')
            ->setDescription('The name of the product')
            ->setMinLength(1)
            ->setMaxLength(100);
        
        $productPriceSchema = new Schema();
        $productPriceSchema->setType('number')
            ->setDescription('The price of the product')
            ->setMinimum(0)
            ->setExclusiveMinimum(true);
        
        $productCategorySchema = new Schema();
        $productCategorySchema->setType('string')
            ->setDescription('The category of the product')
            ->setEnum(['electronics', 'clothing', 'food', 'books']);
        
        $productSchema->addProperty('id', $productIdSchema)
            ->addProperty('name', $productNameSchema)
            ->addProperty('price', $productPriceSchema)
            ->addProperty('category', $productCategorySchema);
        
        // Add the schema to components
        $components->addSchema('Product', $productSchema);
        
        // Create an order schema
        $orderSchema = new Schema();
        $orderSchema->setType('object')
            ->setTitle('Order')
            ->setDescription('An order in the e-commerce system')
            ->setRequired(['id', 'customerId', 'items', 'totalAmount']);
        
        $orderIdSchema = new Schema();
        $orderIdSchema->setType('string')
            ->setDescription('The unique identifier for an order')
            ->setFormat('uuid');
        
        $customerIdSchema = new Schema();
        $customerIdSchema->setType('string')
            ->setDescription('The unique identifier for a customer')
            ->setFormat('uuid');
        
        $orderItemSchema = new Schema();
        $orderItemSchema->setType('object')
            ->setDescription('An item in an order')
            ->setRequired(['productId', 'quantity', 'price']);
        
        $orderItemSchema->addProperty('productId', $productIdSchema)
            ->addProperty('quantity', (new Schema())->setType('integer')->setMinimum(1))
            ->addProperty('price', $productPriceSchema);
        
        $orderSchema->addProperty('id', $orderIdSchema)
            ->addProperty('customerId', $customerIdSchema)
            ->addProperty('items', (new Schema())->setType('array')->setItems($orderItemSchema))
            ->addProperty('totalAmount', $productPriceSchema)
            ->addProperty('status', (new Schema())->setType('string')->setEnum(['pending', 'processing', 'shipped', 'delivered', 'cancelled']));
        
        // Add the schema to components
        $components->addSchema('Order', $orderSchema);
        
        // Create message traits
        $baseMessageTrait = new MessageTrait();
        $baseMessageTrait->setContentType('application/json')
            ->setSchemaFormat('application/schema+json');
        
        // Add the message trait to components
        $components->addMessageTrait('baseMessage', $baseMessageTrait);
        
        // Create operation traits
        $baseOperationTrait = new OperationTrait();
        $baseOperationTrait->setDescription('Base operation for all operations');
        
        // Add the operation trait to components
        $components->addOperationTrait('baseOperation', $baseOperationTrait);
        
        // Create security schemes
        $oauth2Scheme = new SecurityScheme('oauth2');
        $oauth2Scheme->setDescription('OAuth 2.0 authentication');
        
        // Create OAuth flows
        $oauthFlows = new OAuthFlows();
        
        // Create implicit flow
        $implicitFlow = new OAuthFlow();
        $implicitFlow->setAuthorizationUrl('https://example.com/oauth/authorize')
            ->setRefreshUrl('https://example.com/oauth/refresh')
            ->addScope('read:products', 'Read products')
            ->addScope('write:orders', 'Create and update orders');
        $oauthFlows->setImplicit($implicitFlow);
        
        // Add flows to security scheme
        $oauth2Scheme->setFlows($oauthFlows);
        
        // Add security scheme to components
        $components->addSecurityScheme('oauth2', $oauth2Scheme);
        
        // Create correlation IDs
        $orderCorrelationId = new CorrelationId('$message.header#/correlationId');
        $orderCorrelationId->setDescription('Correlation ID for order-related messages');
        
        // Add correlation ID to components
        $components->addCorrelationId('orderCorrelationId', $orderCorrelationId);
        
        // Create channels
        
        // Product channel
        $productChannel = new Channel();
        $productChannel->setTitle('Product Channel')
            ->setDescription('Channel for product-related events')
            ->setSummary('Product events');
        
        // Add channel parameters
        $productIdParam = new Parameter();
        $productIdParam->setDescription('The product ID')
            ->setLocation('path')
            ->setSchema($productIdSchema);
        $productChannel->addParameter('productId', $productIdParam);
        
        // Create product created message
        $productCreatedMessage = new Message();
        $productCreatedMessage->setName('productCreated')
            ->setTitle('Product Created')
            ->setDescription('Event signaling that a new product has been created')
            ->setSummary('New product created')
            ->setContentType('application/json')
            ->setPayload($productSchema);
        
        // Add message example
        $productExample = new MessageExample();
        $productExample->setName('basicProduct')
            ->setSummary('A basic product example')
            ->setDescription('Example of a basic product')
            ->setValue([
                'id' => '123e4567-e89b-12d3-a456-426614174000',
                'name' => 'Smartphone X',
                'price' => 599.99,
                'category' => 'electronics'
            ]);
        $productCreatedMessage->addExample($productExample);
        
        // Add message to components
        $components->addMessage('ProductCreated', $productCreatedMessage);
        
        // Create product updated message
        $productUpdatedMessage = new Message();
        $productUpdatedMessage->setName('productUpdated')
            ->setTitle('Product Updated')
            ->setDescription('Event signaling that a product has been updated')
            ->setSummary('Product updated')
            ->setContentType('application/json')
            ->setPayload($productSchema);
        
        // Add message to components
        $components->addMessage('ProductUpdated', $productUpdatedMessage);
        
        // Create product deleted message
        $productDeletedMessage = new Message();
        $productDeletedMessage->setName('productDeleted')
            ->setTitle('Product Deleted')
            ->setDescription('Event signaling that a product has been deleted')
            ->setSummary('Product deleted')
            ->setContentType('application/json')
            ->setPayload((new Schema())->setType('object')->addProperty('id', $productIdSchema));
        
        // Add message to components
        $components->addMessage('ProductDeleted', $productDeletedMessage);
        
        // Create publish operation for product created
        $publishProductCreated = new ChannelOperation('publishProductCreated');
        $publishProductCreated->setTitle('Publish Product Created')
            ->setDescription('Publish an event when a product is created')
            ->setSummary('Publish product created event');
        
        // Create reference to product created message
        $productCreatedRef = new Reference('#/components/messages/ProductCreated');
        
        // Create operation
        $productCreatedOperation = new Operation();
        $productCreatedOperation->setTitle('Product Created Operation')
            ->setDescription('Operation for product created events')
            ->setSummary('Product created operation')
            ->setMessage($productCreatedRef);
        
        // Add operation to AsyncAPI
        $asyncApi->addOperation('publishProductCreated', $productCreatedOperation);
        
        // Add channel operation
        $productChannel->addOperation('publish', $publishProductCreated);
        
        // Add channel to AsyncAPI
        $asyncApi->addChannel('products/{productId}', $productChannel);
        
        // Order channel
        $orderChannel = new Channel();
        $orderChannel->setTitle('Order Channel')
            ->setDescription('Channel for order-related events')
            ->setSummary('Order events');
        
        // Add channel parameters
        $orderIdParam = new Parameter();
        $orderIdParam->setDescription('The order ID')
            ->setLocation('path')
            ->setSchema($orderIdSchema);
        $orderChannel->addParameter('orderId', $orderIdParam);
        
        // Create order created message
        $orderCreatedMessage = new Message();
        $orderCreatedMessage->setName('orderCreated')
            ->setTitle('Order Created')
            ->setDescription('Event signaling that a new order has been created')
            ->setSummary('New order created')
            ->setContentType('application/json')
            ->setPayload($orderSchema);
        
        // Add message to components
        $components->addMessage('OrderCreated', $orderCreatedMessage);
        
        // Create order updated message
        $orderUpdatedMessage = new Message();
        $orderUpdatedMessage->setName('orderUpdated')
            ->setTitle('Order Updated')
            ->setDescription('Event signaling that an order has been updated')
            ->setSummary('Order updated')
            ->setContentType('application/json')
            ->setPayload($orderSchema);
        
        // Add message to components
        $components->addMessage('OrderUpdated', $orderUpdatedMessage);
        
        // Create publish operation for order created
        $publishOrderCreated = new ChannelOperation('publishOrderCreated');
        $publishOrderCreated->setTitle('Publish Order Created')
            ->setDescription('Publish an event when an order is created')
            ->setSummary('Publish order created event');
        
        // Create reference to order created message
        $orderCreatedRef = new Reference('#/components/messages/OrderCreated');
        
        // Create operation
        $orderCreatedOperation = new Operation();
        $orderCreatedOperation->setTitle('Order Created Operation')
            ->setDescription('Operation for order created events')
            ->setSummary('Order created operation')
            ->setMessage($orderCreatedRef);
        
        // Add operation to AsyncAPI
        $asyncApi->addOperation('publishOrderCreated', $orderCreatedOperation);
        
        // Add channel operation
        $orderChannel->addOperation('publish', $publishOrderCreated);
        
        // Add channel to AsyncAPI
        $asyncApi->addChannel('orders/{orderId}', $orderChannel);
        
        // Add components to AsyncAPI
        $asyncApi->setComponents($components);
        
        return $asyncApi;
    }
    
    /**
     * Generate json from the complete AsyncAPI specification.
     */
    public static function generate(): string
    {
        return json_encode(self::createCompleteSpec());
    }
    
    /**
     * Save the complete AsyncAPI specification to a file.
     */
    public static function saveToFile(string $filePath): void
    {
        file_put_contents($filePath, self::generate());
        echo "Complete AsyncAPI specification saved to $filePath" . PHP_EOL;
    }
}