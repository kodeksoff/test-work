<?php

declare(strict_types=1);

namespace App\Services\Logger\Enums;

enum LogLevel: string
{
    case INFO = 'info';
    case WARNING = 'warning';
    case ERROR = 'error';
}
