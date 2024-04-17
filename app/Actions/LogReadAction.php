<?php

declare(strict_types=1);

namespace App\Actions;

use App\DataTransferObjects\LogWriteData;
use App\Services\Logger\Enums\LogWriter;
use App\Services\Logger\Factories\LoggerFactory;
use App\Services\Logger\Logger;
use Throwable;

final readonly class LogReadAction
{
    public function __construct(private LoggerFactory $logWriterFactory)
    {
    }

    /**
     * @throws Throwable
     */
    public function __invoke(): array
    {
        /*
         * Представим что тип врайтера берем от настроек клиента
         */
        $writer = $this
            ->logWriterFactory
            ->makeLogger(LogWriter::CSV);

        $logger = new Logger($writer);

        return $logger->read();
    }
}