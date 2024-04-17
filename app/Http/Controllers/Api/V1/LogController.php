<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\LogReadAction;
use App\Actions\LogWriteAction;
use App\DataTransferObjects\Factories\LogWriteDataFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLogRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Throwable;

final class LogController extends Controller
{
    public function index(ResponseFactory $responseFactory, LogReadAction $getLogAction): JsonResponse
    {
        return $responseFactory->json($getLogAction());
    }

    /**
     * @throws Throwable
     */
    public function store(
        CreateLogRequest $createLogRequest,
        LogWriteAction $logWriteAction,
        ResponseFactory $responseFactory,
    ): JsonResponse {
        $logWriteAction(LogWriteDataFactory::fromRequest($createLogRequest));

        return $responseFactory->json('OK');
    }
}
