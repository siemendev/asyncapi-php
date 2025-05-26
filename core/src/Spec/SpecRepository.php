<?php

namespace Siemendev\AsyncapiPhp\Spec;

use LogicException;
use Siemendev\AsyncapiPhp\Spec\Helper\ReferenceResolver;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\Channel;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;
use Siemendev\AsyncapiPhp\Spec\Model\Server;

class SpecRepository
{
    public function getDefaultServerNameForChannel(AsyncApi $spec, Channel $channel): string
    {
        if (empty($channel->getServers())) {
            return array_key_first($spec->getServers());
        }

        $parts = explode('/', $channel->getServers()[0]?->getRef());

        return end($parts) ?: array_key_first($spec->getServers());
    }

    public function getServerForChannel(AsyncApi $spec, Channel $channel, string $serverName): Server
    {
        $serverSpecs = [];
        foreach ($channel->getServers() as $serverRef) {
            $parts = explode('/', $serverRef->getRef());
            $serverSpecs[end($parts)] = $serverRef->resolve($spec, Server::class);
        }
        if (empty($serverSpecs)) {
            $serverSpecs = $spec->getServers();
        }

        $serverSpec = $serverSpecs[$serverName];
        if ($serverSpec instanceof Server) {
            return $serverSpec;
        }
        if ($serverSpec instanceof Reference) {
            $serverSpec = $serverSpec->resolve($spec, Server::class);
        }
        if ($serverSpec instanceof Server) {
            return $serverSpec;
        }

        throw new LogicException(sprintf('Server "%s" not found for channel "%s"', $serverName, $channel->getTitle() ?? '<no title>')); # todo change this to be more helpful
    }
}
