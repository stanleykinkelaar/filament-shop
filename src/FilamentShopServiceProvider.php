<?php

namespace Stanleykinkelaar\FilamentShop;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Stanleykinkelaar\FilamentShop\Commands\FilamentShopSetupCommand;
use Stanleykinkelaar\FilamentShop\Commands\FilamentShopUserCommand;
use Stanleykinkelaar\FilamentShop\Resources\BrandResource;
use Stanleykinkelaar\FilamentShop\Resources\CategoryResource;
use Stanleykinkelaar\FilamentShop\Resources\CouponResource;
use Stanleykinkelaar\FilamentShop\Resources\CustomerResource;
use Stanleykinkelaar\FilamentShop\Resources\ProductResource;

class FilamentShopServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        CustomerResource::class,
        BrandResource::class,
        CategoryResource::class,
        CouponResource::class,
        ProductResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-shop')
            ->hasConfigFile('filament-shop')
            ->hasCommands([
                FilamentShopSetupCommand::class,
                FilamentShopUserCommand::class,
            ])
            ->hasMigrations([
                'create_products_table',
                'create_customers_table',
                'create_orders_table',
                'create_categories_table',
                'create_brands_table',
                'create_coupons_table',
                'create_order_lines_table',
                'add_constraints',
            ]);
    }
}
