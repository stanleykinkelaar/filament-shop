<?php

namespace Stanleykinkelaar\FilamentShop\Resources\CustomerResourcePages;

use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Stanleykinkelaar\FilamentShop\Resources\CustomerResource;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        return $data;
    }
}
