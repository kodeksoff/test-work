<?php

declare(strict_types=1);

namespace App\Services\Logger\Factories;

use App\Services\Logger\Contracts\LoggerContract;
use App\Services\Logger\Contracts\LogWriterContract;
use App\Services\Logger\Enums\LogWriter;
use App\Services\Logger\Exceptions\WriterNotAvailableException;
use App\Services\Logger\Loggers\CsvLogger;
use Throwable;

class LoggerFactory
{
    public static array $writers = [
        LogWriter::CSV->value => CsvLogger::class,
    ];

    /**
     * @throws Throwable
     */
    public function makeLogger(LogWriter $logWriter): LoggerContract
    {
        throw_if(
            !array_key_exists($logWriter->value, self::$writers),
            WriterNotAvailableException::class,
        );

        return resolve(self::$writers[$logWriter->value]);
    }
}