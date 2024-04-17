<?php

declare(strict_types=1);

namespace App\Services\Logger\Contracts;

interface LoggerContract extends LogReaderContract, LogWriterContract
{
}