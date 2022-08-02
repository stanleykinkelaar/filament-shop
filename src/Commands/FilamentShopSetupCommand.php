<?php

namespace Stanleykinkelaar\FilamentShop\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FilamentShopSetupCommand extends Command
{
    public $signature = 'filament-shop:setup';

    public $description = 'Resources shop setup command';

    public function handle(): int
    {
        // run permission seeder
        Artisan::call('vendor:publish --tag=filament-shop-migrations');
        Artisan::call('vendor:publish --tag=filament-config');
        Artisan::call('vendor:publish --tag=migrations');
        Artisan::call('vendor:publish --tag=config');
        Artisan::call('vendor:publish --tag="filament-access-control-migrations"');
        Artisan::call('vendor:publish --tag="filament-access-control-config"');
        Artisan::call('filament-access-control:install');

        return self::SUCCESS;
    }
}
