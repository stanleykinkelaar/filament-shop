<?php

namespace Stanleykinkelaar\FilamentShop\Resources\DiscountResourcePages;

use Filament\Resources\Pages\CreateRecord;
use Stanleykinkelaar\FilamentShop\Models\Discount;

class CreateDiscount extends CreateRecord
{
    protected static string $resource = Discount::class;
}
