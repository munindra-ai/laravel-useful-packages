<?php

namespace Munindraai\LaravelUsefulPackages;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Spatie\Backup\BackupServiceProvider;
use Spatie\MediaLibrary\MediaLibraryServiceProvider;

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
    }

    public function boot()
    {
        // Automatically publish config files if they don't exist
        if (!file_exists(config_path('backup.php'))) {
            Artisan::call('vendor:publish', [
                '--provider' => "Spatie\\Backup\\BackupServiceProvider"
            ]);
        }

        if (!file_exists(config_path('medialibrary.php'))) {
            Artisan::call('vendor:publish', [
                '--provider' => "Spatie\\MediaLibrary\\MediaLibraryServiceProvider"
            ]);
        }
    }
}