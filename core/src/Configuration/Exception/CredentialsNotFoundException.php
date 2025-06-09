<?php

declare(strict_types=1);

namespace Siemendev\AsyncapiPhp\Configuration\Exception;

use Exception;

class CredentialsNotFoundException extends Exception implements AsyncApiPhpConfigurationException {}
