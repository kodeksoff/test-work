<?php

declare(strict_types=1);

namespace App\Services\Logger\Writers;

use App\Services\Logger\Contracts\LogWriterContract;
use App\Services\Logger\Entities\LogEntity;
use Illuminate\Contracts\Filesystem\Filesystem;

readonly class CsvWriter implements LogWriterContract
{
    public function __construct(private Filesystem $filesystem)
    {
    }

    public function write(LogEntity $logEntity): void
    {
        /*
         * Важно!
         * Предвижу вопрос по поводу гонки процессов и блокировки файла на запись
         * Для этого в конфиге указан параметр lock который подхватывает локальный адаптер
         * Файловой системы
         */
        $this
            ->filesystem
            ->append('logs.csv', (string)$logEntity);
    }
}