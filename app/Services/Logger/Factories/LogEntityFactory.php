<?php

declare(strict_types=1);

namespace App\Services\Logger\Factories;

use App\DataTransferObjects\LogWriteData;
use App\Services\Logger\Entities\LogEntity;
use Illuminate\Support\Str;

class LogEntityFactory
{
    public static function fromDTO(LogWriteData $logWriteData): LogEntity
    {
        return new LogEntity(
            Str::uuid()->toString(),
            $logWriteData->createdAt,
            $logWriteData->client,
            $logWriteData->message,
            $logWriteData->level,
            $logWriteData->userId,
        );
    }
}