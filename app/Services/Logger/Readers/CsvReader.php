<?php

declare(strict_types=1);

namespace App\Services\Logger\Readers;

use App\Services\Logger\Contracts\LogReaderContract;
use App\Services\Logger\Entities\LogEntity;
use App\Services\Logger\Enums\LogLevel;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Carbon;
use SplFileObject;

readonly class CsvReader implements LogReaderContract
{
    public function __construct(private Filesystem $filesystem)
    {
    }

    public function read(): array
    {
        $result = [];
        $file = new SplFileObject(
            $this
                ->filesystem
                ->path('logs.csv'),
        );

        $file->setFlags(SplFileObject::READ_CSV);

        foreach ($file as $row) {
            $result[] = new LogEntity(
                $row[0],
                Carbon::parse($row[1]),
                $row[2],
                $row[3],
                LogLevel::from($row[4]),
                null,
            );
        }

        return $result;
    }
}