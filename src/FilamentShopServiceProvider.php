<?php

namespace Stanleykinkelaar\FilamentShop;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Stanleykinkelaar\FilamentShop\Commands\FilamentShopCommand;

class FilamentShopServiceProvider extends PluginServiceProvider
{
    protected array $resources = [

    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-shop')
            ->hasConfigFile('filament-shop')
            ->hasMigrations(
                [
                    'create_products_table',
                    'create_customers_table',
                    'create_orders_table',
                    'create_categories_table',
                    'create_brands_table',
                    'create_discounts_table',
                ]
            )
            ->runsMigrations()
            ->hasCommand(FilamentShopCommand::class);
    }
}
