<?php

namespace Stanleykinkelaar\FilamentShop\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Stanleykinkelaar\FilamentShop\Models\Customer;
use Stanleykinkelaar\FilamentShop\Resources\CustomerResourcePages\CreateCustomer;
use Stanleykinkelaar\FilamentShop\Resources\CustomerResourcePages\EditCustomer;
use Stanleykinkelaar\FilamentShop\Resources\CustomerResourcePages\ListCustomer;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationLabel = 'filament-shop::navigation.customers';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('firstname')->required(),
                TextInput::make('middlename')->nullable(),
                TextInput::make('lastname')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->password()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('firstname')
                    ->label(__('filament-shop::default.fields.firstname'))
                    ->searchable(),
                TextColumn::make('middlename')
                    ->label(__('filament-shop::default.fields.middlename'))
                    ->searchable(),
                TextColumn::make('lastname')
                    ->label(__('filament-shop::default.fields.lastname'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('filament-shop::default.fields.email'))
                    ->searchable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomer::route('/'),
            'create' => CreateCustomer::route('/create'),
            'edit' => EditCustomer::route('/{record}/edit'),
        ];
    }
}
