<?php

namespace Stanleykinkelaar\FilamentShop\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Stanleykinkelaar\FilamentShop\Models\Coupon;
use Stanleykinkelaar\FilamentShop\Resources\CouponResourcePages\CreateCoupon;
use Stanleykinkelaar\FilamentShop\Resources\CouponResourcePages\EditCoupon;
use Stanleykinkelaar\FilamentShop\Resources\CouponResourcePages\ListCoupon;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static ?string $navigationIcon = 'heroicon-o-qrcode';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationLabel = 'filament-shop::navigation.coupons';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->required()
                    ->unique(),
                DateTimePicker::make('expires_at')
                    ->displayFormat(config('filament-shop.date-time-format'))
                    ->required(),
                Select::make('customer_id')
                    ->relationship('customer', 'email')
                    ->searchable()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label(__('filament-shop::default.fields.code'))
                    ->searchable(),
                TextColumn::make('expires_at')
                    ->label(__('filament-shop::default.fields.expires_at')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCoupon::route('/'),
            'create' => CreateCoupon::route('/create'),
            'edit' => EditCoupon::route('/{record}/edit'),
        ];
    }
}
