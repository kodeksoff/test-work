<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

use App\Services\Logger\Enums\LogLevel;
use Illuminate\Support\Carbon;

final readonly class LogWriteData
{
    public function __construct(
        public Carbon $createdAt,
        public string $client,
        public string $message,
        public LogLevel $level,
        public ?int $userId,
    ) {
    }
}