<?php

namespace Munindraai\LaravelUsefulPackages\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Munindraai\LaravelUsefulPackages\LaravelUsefulPackages
 */
class LaravelUsefulPackages extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Munindraai\LaravelUsefulPackages\LaravelUsefulPackages::class;
    }
}
