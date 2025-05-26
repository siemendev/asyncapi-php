<?php

namespace Siemendev\AsyncapiPhp\Spec\Model;

/**
 * Lists the required security schemes to execute this operation.
 * 
 * The name used for each property MUST correspond to a security scheme declared
 * in the components.securitySchemes section of the AsyncAPI document.
 */
class SecurityRequirement extends AsyncApiObject
{
    /**
     * The security requirements.
     *
     * @var array<string, array<string>>
     */
    protected array $requirements = [];

    /**
     * Add a security requirement.
     *
     * @param array<string> $scopes The required scopes (empty array if no scopes are required)
     */
    public function addRequirement(string $name, array $scopes = []): self
    {
        $this->requirements[$name] = $scopes;
        return $this;
    }

    /**
     * Get the security requirements.
     *
     * @return array<string, array<string>>
     */
    public function getRequirements(): array
    {
        return $this->requirements;
    }

    /**
     * Convert the object to an array representation.
     *
     * @return array<string, array<string>>
     */
    public function toArray(): array
    {
        return $this->requirements;
    }
}
