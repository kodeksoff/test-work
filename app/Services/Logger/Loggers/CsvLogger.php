<?php

declare(strict_types=1);

namespace App\Services\Logger\Loggers;

use App\Services\Logger\Contracts\LoggerContract;
use App\Services\Logger\Entities\LogEntity;
use App\Services\Logger\Readers\CsvReader;
use App\Services\Logger\Writers\CsvWriter;

final readonly class CsvLogger implements LoggerContract
{
    public function __construct(private CsvWriter $writer, private CsvReader $reader)
    {
    }

    public function write(LogEntity $logEntity): void
    {
        $this
            ->writer
            ->write($logEntity);
    }

    public function read(): array
    {
        return $this
            ->reader
            ->read();
    }
}