<?php

namespace Siemendev\AsyncapiPhp\Spec\Demo;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\ChannelOperation;
use Siemendev\AsyncapiPhp\Spec\Model\Components;
use Siemendev\AsyncapiPhp\Spec\Model\Contact;
use Siemendev\AsyncapiPhp\Spec\Model\Info;
use Siemendev\AsyncapiPhp\Spec\Model\License;
use Siemendev\AsyncapiPhp\Spec\Model\Message;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\Parameter;
use Siemendev\AsyncapiPhp\Spec\Model\Schema;
use Siemendev\AsyncapiPhp\Spec\Model\Server;
use Siemendev\AsyncapiPhp\Spec\Model\ServerVariable;

/**
 * Example usage of the AsyncAPI specification classes.
 */
class Example
{
    /**
     * Create a sample AsyncAPI specification.
     */
    public static function createSampleSpec(): AsyncApi
    {
        // Create the Info object
        $info = new Info('Sample API', '1.0.0');
        $info->setDescription('This is a sample AsyncAPI specification');

        // Create a Contact object
        $contact = new Contact();
        $contact->setName('API Support')
            ->setUrl('https://example.com/support')
            ->setEmail('support@example.com');

        // Add the Contact to the Info
        $info->setContact($contact);

        // Create a License object
        $license = new License('Apache 2.0');
        $license->setUrl('https://www.apache.org/licenses/LICENSE-2.0.html');

        // Add the License to the Info
        $info->setLicense($license);

        // Create the AsyncAPI object
        $asyncApi = new AsyncApi($info);
        $asyncApi->setId('urn:example:asyncapi:sample');
        $asyncApi->setDefaultContentType('application/json');

        // Create a Server object
        $server = new Server('example.com', 'mqtt');
        $server->setDescription('Production server')
            ->setProtocolVersion('3.1.1');

        // Create a ServerVariable object
        $serverVariable = new ServerVariable('1883');
        $serverVariable->setDescription('The port to connect to')
            ->setEnum(['1883', '8883']);

        // Add the ServerVariable to the Server
        $server->addVariable('port', $serverVariable);

        // Add the Server to the AsyncAPI object
        $asyncApi->addServer('production', $server);

        // Create a Schema for the message payload
        $messageSchema = new Schema();
        $messageSchema->setType('object')
            ->setTitle('Message')
            ->setDescription('A message object');

        // Add properties to the Schema
        $idSchema = new Schema();
        $idSchema->setType('string')
            ->setDescription('The message ID');

        $contentSchema = new Schema();
        $contentSchema->setType('string')
            ->setDescription('The message content');

        $messageSchema->addProperty('id', $idSchema)
            ->addProperty('content', $contentSchema)
            ->addRequired('id')
            ->addRequired('content');

        // Create a Message object
        $message = new Message();
        $message->setName('userMessage')
            ->setTitle('User Message')
            ->setDescription('A message from a user')
            ->setContentType('application/json')
            ->setPayload($messageSchema);

        // Create a Channel object
        $channel = new Channel();
        $channel->setTitle('User Messages')
            ->setDescription('Channel for user messages');

        // Create a ChannelOperation object
        $publishOperation = new ChannelOperation('publish');
        $publishOperation->setTitle('Publish Message')
            ->setDescription('Publish a message to the channel');

        // Add the ChannelOperation to the Channel
        $channel->addOperation('publish', $publishOperation);

        // Create a Parameter object
        $parameter = new Parameter();
        $parameter->setDescription('The user ID')
            ->setLocation('path');

        // Add the Parameter to the Channel
        $channel->addParameter('userId', $parameter);

        // Add the Channel to the AsyncAPI object
        $asyncApi->addChannel('user/{userId}/messages', $channel);

        // Create an Operation object
        $operation = new Operation();
        $operation->setTitle('Send Message')
            ->setDescription('Send a message to a user')
            ->setMessage($message);

        // Add the Operation to the AsyncAPI object
        $asyncApi->addOperation('sendMessage', $operation);

        // Create a Components object
        $components = new Components();

        // Add the Schema to the Components
        $components->addSchema('Message', $messageSchema);

        // Add the Components to the AsyncAPI object
        $asyncApi->setComponents($components);

        return $asyncApi;
    }

    /**
     * Generate json from the sample AsyncAPI specification.
     */
    public static function generate(): string
    {
        return json_encode(self::createSampleSpec());
    }
}
