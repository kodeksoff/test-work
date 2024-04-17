<?php

declare(strict_types=1);

namespace App\Services\Logger\Contracts;

use App\Services\Logger\Entities\LogEntity;

interface LogWriterContract
{
    public function write(LogEntity $logEntity): void;
}