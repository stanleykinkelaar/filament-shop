<?php

namespace Stanleykinkelaar\FilamentShop\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Stanleykinkelaar\FilamentShop\Models\Brand;
use Stanleykinkelaar\FilamentShop\Resources\BrandResourcePages\CreateBrand;
use Stanleykinkelaar\FilamentShop\Resources\BrandResourcePages\EditBrand;
use Stanleykinkelaar\FilamentShop\Resources\BrandResourcePages\ListBrand;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationLabel = 'filament-shop::navigation.brands';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-shop::default.fields.name'))
                    ->searchable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBrand::route('/'),
            'create' => CreateBrand::route('/create'),
            'edit' => EditBrand::route('/{record}/edit'),
        ];
    }
}
