<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\LogController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::name('api:')
    ->prefix('/v1')
    ->group(static function (Router $router): void {
        $router
            ->name('logs:')
            ->prefix('/logs')
            ->group(static function (Router $router): void {
                $router
                    ->get('/', [LogController::class, 'index'])
                    ->name('get');
                $router
                    ->post('/', [LogController::class, 'store'])
                    ->name('write');
            });
    });
