<?php

declare(strict_types=1);

namespace App\Actions;

use App\DataTransferObjects\LogWriteData;
use App\Services\Logger\Enums\LogWriter;
use App\Services\Logger\Factories\LogEntityFactory;
use App\Services\Logger\Logger;
use App\Services\Logger\LoggerManager;
use Throwable;


final readonly class LogWriteAction
{
    public function __construct(private LoggerManager $loggerManager)
    {
    }

    /**
     * @throws Throwable
     */
    public function __invoke(LogWriteData $logWriteData): void
    {
        /*
         * Представим что тип врайтера берем от настроек клиента
         */
        $writer = $this
            ->loggerManager
            ->driver(LogWriter::CSV);

        $logger = new Logger($writer);

        $logger->log(LogEntityFactory::fromDTO($logWriteData));
    }
}