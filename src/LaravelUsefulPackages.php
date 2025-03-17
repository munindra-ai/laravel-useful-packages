<?php

namespace Munindraai\LaravelUsefulPackages;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Spatie\Backup\BackupServiceProvider;

class LaravelUsefulPackages extends ServiceProvider
{
    public function register()
    {
        if (!App::providerIsLoaded(DebugbarServiceProvider::class)) {
            $this->app->register(DebugbarServiceProvider::class);
        }

        if (!App::resolved(BackupServiceProvider::class)) {
            $this->app->register(BackupServiceProvider::class);
        }
    }
}