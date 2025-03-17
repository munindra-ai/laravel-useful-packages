<?php

namespace Munindraai\LaravelUsefulPackages;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Munindraai\LaravelUsefulPackages\Commands\LaravelUsefulPackagesCommand;

class LaravelUsefulPackagesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-useful-packages')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_useful_packages_table')
            ->hasCommand(LaravelUsefulPackagesCommand::class);
    }
}
