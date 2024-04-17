<?php

declare(strict_types=1);

namespace App\Services\Logger\Entities;

use App\Services\Logger\Enums\LogLevel;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Stringable;

final readonly class LogEntity implements Arrayable, Stringable
{
    public function __construct(
        public string $uuid,
        public Carbon $createdAt,
        public string $client,
        public string $message,
        public LogLevel $level,
        public ?int $userId,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->uuid,
            'created_at' => $this->createdAt->toDateTimeString(),
            'client' => $this->client,
            'message' => $this->message,
            'level' => $this->level->value,
            'user_id' => $this->userId,
        ];
    }

    public function __toString(): string
    {
        return rtrim(
            implode(
                ',',
                $this->toArray(),
            ),
            ',',
        );
    }
}