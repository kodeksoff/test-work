<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Factories;

use App\DataTransferObjects\LogWriteData;
use App\Http\Requests\CreateLogRequest;
use App\Services\Logger\Enums\LogLevel;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Carbon;

final readonly class LogWriteDataFactory
{
    public static function fromRequest(CreateLogRequest $createLogRequest): LogWriteData
    {
        $auth = resolve(Factory::class);

        return new LogWriteData(
            Carbon::parse($createLogRequest->input('datetime')),
            $createLogRequest->input('client'),
            $createLogRequest->input('message'),
            LogLevel::from($createLogRequest->input('level')),
            $auth
                ->user()
                ?->id,
        );
    }
}