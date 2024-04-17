<?php

declare(strict_types=1);

namespace App\Services\Logger\Exceptions;

use Exception;

class WriterNotAvailableException extends Exception
{
    protected $message = 'Writer not available';
    protected $code = 500;
}
