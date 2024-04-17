<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class AccessTokenNotProvidedException extends Exception
{
    protected $message = 'Access token not provided';
    protected $code = 401;
}
