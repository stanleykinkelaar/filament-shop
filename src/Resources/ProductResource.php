<?php

namespace Stanleykinkelaar\FilamentShop\Resources;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Stanleykinkelaar\FilamentShop\Models\Product;
use Stanleykinkelaar\FilamentShop\Resources\ProductResourcePages\CreateProduct;
use Stanleykinkelaar\FilamentShop\Resources\ProductResourcePages\EditProduct;
use Stanleykinkelaar\FilamentShop\Resources\ProductResourcePages\ListProduct;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationLabel = 'filament-shop::navigation.products';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                RichEditor::make('description')
                    ->required(),
                TextInput::make('price')
                    ->numeric()
                    ->required(),
                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->nullable(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-shop::default.fields.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('price')
                    ->label(__('filament-shop::default.fields.price'))
                    ->sortable()
                    ->money(config('filament-shop.currency')),
                TextColumn::make('brand_id')
                    ->label(__('filament-shop::default.fields.brand'))
                    ->sortable()
                    ->default('-'),
                TextColumn::make('category_id')
                    ->label(__('filament-shop::default.fields.category'))
                    ->sortable()
                    ->default('-'),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProduct::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
