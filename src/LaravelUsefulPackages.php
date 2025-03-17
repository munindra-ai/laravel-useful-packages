<?php

namespace Munindraai\LaravelUsefulPackages;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Spatie\Backup\BackupServiceProvider;
use Spatie\MediaLibrary\MediaLibraryServiceProvider;
use Spatie\LaravelData\LaravelDataServiceProvider;

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
        if (!App::resolved(MediaLibraryServiceProvider::class)) {
            $this->app->register(MediaLibraryServiceProvider::class);
        }
        if (!App::resolved(LaravelDataServiceProvider::class)) {
            $this->app->register(MediaLibraryServiceProvider::class);
        }
    }
}