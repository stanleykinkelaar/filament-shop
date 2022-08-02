<?php

namespace Stanleykinkelaar\FilamentShop\Resources;

use Filament\Resources\Resource;
use Stanleykinkelaar\FilamentShop\Models\Discount;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Stanleykinkelaar\FilamentShop\Resources\DiscountResourcePages\CreateDiscount;
use Stanleykinkelaar\FilamentShop\Resources\DiscountResourcePages\EditDiscount;
use Stanleykinkelaar\FilamentShop\Resources\DiscountResourcePages\ListDiscount;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;
    protected static ?string $navigationIcon = 'heroicon-o-qrcode';
    protected static ?string $navigationGroup = 'Shop';
    protected static ?string $navigationLabel = 'filament-shop::navigation.discounts';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                TextInput::make('code')
//                    ->required(),
//                DateTimePicker::make('expiration_date')
//                    ->nullable(),
//                Select::make('customer_id')
//                    ->relationship('customers', 'fullname')
//                    ->label(__('filament-shop::default.fields.customer'))
//                    ->searchable()
//                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                TextColumn::make('code')
//                    ->label(__('filament-shop::default.fields.codes'))
//                    ->searchable(),
//                TextColumn::make('expiration_date')
//                    ->label(__('filament-shop::default.fields.expiration_dates'))
//                    ->searchable(),
//                TextColumn::make('customer_id')
//                    ->label(__('filament-shop::default.fields.customers'))
//                    ->searchable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDiscount::route('/'),
            'create' => CreateDiscount::route('/create'),
            'edit' => EditDiscount::route('/{record}/edit'),
        ];
    }
}
