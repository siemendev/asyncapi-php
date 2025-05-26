<?php

namespace Siemendev\AsyncapiPhp\Spec\Helper;

use Siemendev\AsyncapiPhp\Spec\Model\AsyncApi;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;

class ReferenceResolver
{
    /**
     * @template T of AsyncApiObject
     * @param class-string<T>|null $class
     * @return T
     */
    public static function dereference(AsyncApi $spec, Reference $reference, ?string $class = null): AsyncApiObject
    {
        $ref = trim($reference->getRef(), '#/');
        $parts = explode('/', $ref);

        $value = clone $spec;
        foreach ($parts as $part) {
            if (is_object($value)) {
                if (method_exists($value, 'get' . ucfirst($part))) {
                    $value = $value->{'get' . ucfirst($part)}();
                    continue;
                }
                if (property_exists($value, $part)) {
                    $value = $value->{$part};
                    continue;
                }
                throw new \LogicException(sprintf('Reference "%s" not found in spec', $reference->getRef()));
            }

            if (is_array($value)) {
                if (!array_key_exists($part, $value)) {
                    throw new \LogicException(sprintf('Reference "%s" not found in spec', $reference->getRef()));
                }
                $value = $value[$part];
                continue;
            }
            if ($value instanceof \ArrayAccess) {
                if (!$value->offsetExists($part)) {
                    throw new \LogicException(sprintf('Reference "%s" not found in spec', $reference->getRef()));
                }
                $value = $value[$part];
                continue;
            }

            if ($value instanceof Reference) {
                $value = self::dereference($spec, $value, $class);
            }
        }

        if ($class && !($value instanceof $class)) {
            throw new \LogicException(sprintf('Reference "%s" is not of type %s', $reference->getRef(), $class));
        }

        return $value;
    }
}