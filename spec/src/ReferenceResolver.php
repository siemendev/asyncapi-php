<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Spec;

use ArrayAccess;
use LogicException;
use Siemendev\AsyncapiPhp\Spec\Exception\ReferenceNotFoundException;
use Siemendev\AsyncapiPhp\Spec\Model\AsyncApiObject;
use Siemendev\AsyncapiPhp\Spec\Model\Reference;

class ReferenceResolver
{
    /**
     * @throws ReferenceNotFoundException
     */
    public static function resolveReference(AsyncApiObject $element, string $reference): AsyncApiObject
    {
        $parts = explode('/', trim($reference, '#/'));

        $value = $element->getRootElement();

        foreach ($parts as $part) {
            if (is_object($value)) {
                if ($value instanceof Reference) {
                    $value = $value->resolve();
                }
                if ($value instanceof ArrayAccess) {
                    if (!$value->offsetExists($part)) {
                        throw new ReferenceNotFoundException(sprintf('Reference "%s" not found in spec', $reference));
                    }
                    $value = $value[$part];
                    continue;
                }
                if (method_exists($value, 'get' . ucfirst($part))) {
                    $value = $value->{'get' . ucfirst($part)}();
                    continue;
                }
                if (property_exists($value, $part)) {
                    $value = $value->{$part};
                    continue;
                }
                throw new ReferenceNotFoundException(sprintf('Reference "%s" not found in spec', $reference));
            }

            if (is_array($value)) {
                if (!array_key_exists($part, $value)) {
                    throw new ReferenceNotFoundException(sprintf('Reference "%s" not found in spec', $reference));
                }
                $value = $value[$part];
                continue;
            }
        }

        if ($value instanceof Reference) {
            $value = $value->resolve();
        }

        if (!$value instanceof AsyncApiObject) {
            throw new LogicException(sprintf('Reference "%s" does not resolve to an AsyncApiObject', $reference));
        }

        return $value;
    }
}
