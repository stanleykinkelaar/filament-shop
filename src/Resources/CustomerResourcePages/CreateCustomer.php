<?php

namespace Stanleykinkelaar\FilamentShop\Resources\CustomerResourcePages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Stanleykinkelaar\FilamentShop\Models\Customer;
use Stanleykinkelaar\FilamentShop\Resources\CustomerResource;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        return $data;
    }
}
