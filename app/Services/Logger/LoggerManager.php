<?php

declare(strict_types=1);

namespace App\Services\Logger;

use App\Services\Logger\Contracts\LoggerContract;
use App\Services\Logger\Enums\LogWriter;
use App\Services\Logger\Loggers\CsvLogger;
use Illuminate\Support\Manager;

class LoggerManager extends Manager
{

    public function getDefaultDriver(): string
    {
        return LogWriter::CSV->value;
    }

    public function driver($driver = null): LoggerContract
    {
        return parent::driver();
    }

    protected function createCsvDriver(): CsvLogger
    {
        return resolve(CsvLogger::class);
    }
}