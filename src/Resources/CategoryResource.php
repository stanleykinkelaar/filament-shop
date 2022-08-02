<?php

namespace Stanleykinkelaar\FilamentShop\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Stanleykinkelaar\FilamentShop\Models\Category;
use Stanleykinkelaar\FilamentShop\Resources\CategoryResourcePages\CreateCategory;
use Stanleykinkelaar\FilamentShop\Resources\CategoryResourcePages\EditCategory;
use Stanleykinkelaar\FilamentShop\Resources\CategoryResourcePages\ListCategory;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-list';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationLabel = 'filament-shop::navigation.categories';

    protected static ?int $navigationSort = 3;

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
            'index' => ListCategory::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit' => EditCategory::route('/{record}/edit'),
        ];
    }
}
