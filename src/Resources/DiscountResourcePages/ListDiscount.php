<?php

namespace Stanleykinkelaar\FilamentShop\Resources\DiscountResourcePages;

use Filament\Resources\Pages\ListRecords;
use Stanleykinkelaar\FilamentShop\Models\Discount;

class ListDiscount extends ListRecords
{
    protected static string $resource = Discount::class;
}
