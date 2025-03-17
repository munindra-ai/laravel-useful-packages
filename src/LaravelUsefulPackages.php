<?php

namespace Munindraai\LaravelUsefulPackages;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
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
        if (!File::exists(config_path('backup.php'))) {
            $this->publishConfig(BackupServiceProvider::class);
        }

        if (!File::exists(config_path('medialibrary.php'))) {
            $this->publishConfig(MediaLibraryServiceProvider::class);
        }
    }

    protected function publishConfig(string $provider)
    {
        exec("php artisan vendor:publish --provider=\"$provider\"");
    }
}