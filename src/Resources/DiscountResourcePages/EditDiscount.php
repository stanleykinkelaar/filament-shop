<?php

namespace Stanleykinkelaar\FilamentShop\Resources\DiscountResourcePages;

use Filament\Resources\Pages\EditRecord;
use Stanleykinkelaar\FilamentShop\Models\Discount;

class EditDiscount extends EditRecord
{
    protected static string $resource = Discount::class;
}
