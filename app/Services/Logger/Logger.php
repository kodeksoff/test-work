<?php

declare(strict_types=1);

namespace App\Services\Logger;

use App\Services\Logger\Contracts\LoggerContract;
use App\Services\Logger\Contracts\LogReaderContract;
use App\Services\Logger\Contracts\LogWriterContract;
use App\Services\Logger\Entities\LogEntity;

final readonly class Logger
{
    public function __construct(private LoggerContract $loggerContract)
    {
    }

    public function log(LogEntity $logEntity): void
    {
        $this
            ->loggerContract
            ->write($logEntity);
    }

    public function read(): array
    {
        return $this
            ->loggerContract
            ->read();
    }
}