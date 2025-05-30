<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec;

use LogicException;
use Siemendev\AsyncapiPhp\Spec\Exception\InvalidSpecificationException;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Operation;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

class SpecRepository
{
    public function getDefaultServerNameForChannel(Channel $channel): string
    {
        if (empty($channel->getServers())) {
            $name = array_key_first($channel->getRootElement()->resolveServers());
            if (!$name) {
                throw new LogicException('No servers defined'); // todo change this to be more helpful
            }

            return $name;
        }

        $serverRefs = $channel->getServers();
        $serverRef = $serverRefs[array_rand(array_keys($serverRefs))];
        $parts = explode('/', $serverRef->getRef());

        return end($parts);
    }

    public function getServerForChannel(Channel $channel, string $serverName): Server
    {
        $serverSpecs = [];
        foreach ($channel->getServers() as $serverRef) {
            $parts = explode('/', $serverRef->getRef());
            $serverSpecs[end($parts)] = $serverRef->resolve();
        }
        if (empty($serverSpecs)) {
            $serverSpecs = $channel->getRootElement()->resolveServers();
        }

        $serverSpec = $serverSpecs[$serverName] ?? null;
        if ($serverSpec instanceof Server) {
            return $serverSpec;
        }

        throw new LogicException(sprintf('Server "%s" not found for channel "%s"', $serverName, $channel->getTitle() ?? '<no title>')); // todo change this to be more helpful
    }

    /**
     * @throws InvalidSpecificationException
     */
    public function getOperationChannel(Operation $operation): Channel
    {
        if (!$operation->getChannel()) {
            throw new InvalidSpecificationException('Operation does not have a channel defined'); // todo change this to be more helpful
        }
        $channel = $operation->resolveChannel();
        if (!$channel) {
            throw new InvalidSpecificationException('Channel not found'); // todo change this to be more helpful
        }

        return $channel;
    }
}
