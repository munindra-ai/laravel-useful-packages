<?php

namespace Munindraai\LaravelUsefulPackages\Commands;

use Illuminate\Console\Command;

class LaravelUsefulPackagesCommand extends Command
{
    public $signature = 'laravel-useful-packages';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
