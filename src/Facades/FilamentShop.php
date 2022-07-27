<?php

namespace Stanleykinkelaar\FilamentShop\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stanleykinkelaar\FilamentShop\FilamentShop
 */
class FilamentShop extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-shop';
    }
}
