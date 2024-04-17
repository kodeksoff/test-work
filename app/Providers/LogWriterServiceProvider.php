<?php

namespace App\Providers;

use App\Services\Logger\Readers\CsvReader;
use App\Services\Logger\Writers\CsvWriter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class LogWriterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this
            ->app
            ->when([CsvWriter::class, CsvReader::class])
            ->needs(Filesystem::class)
            ->give(static fn (): Filesystem => Storage::disk('logs'));
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
