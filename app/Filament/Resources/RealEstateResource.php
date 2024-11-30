<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealEstateResource\Pages;
use App\Forms\Components\LocationPicker;
use App\Models\Category;
use App\Models\Feature;
use App\Models\RealEstate;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class RealEstateResource extends Resource
{
    protected static ?string $model = RealEstate::class;

    protected static ?string $navigationLabel = 'Gayrimenkul';

    protected static ?string $modelLabel = 'Gayrimenkul';

    protected static ?string $pluralModelLabel = 'Gayrimenkul';

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Translate::make()
                        ->schema([
                            TextInput::make('title')->label('Başlık')->required(),
                            RichEditor::make('description')->label('Açıklama')->required(),
                        ])->columnSpanFull()->contained(false),

                    SpatieMediaLibraryFileUpload::make('images')
                        ->reorderable()
                        ->collection('realestates')
                        ->columnSpanFull()
                        ->multiple()
                        ->responsiveImages()
                        ->live()
                        ->maxFiles(20)
                        ->panelLayout('grid'),

                    SelectTree::make('category_id')
                        ->label('Kategori')
                        ->relationship('category', 'name', 'parent_id')
                        ->withCount()
                        ->searchable()
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function (callable $set, $state) {
                            $set('features', []);
                        })

                        ->columnSpanFull(),

                    TextInput::make('price')
                        ->label('Fiyat')
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('net_area')
                        ->label('Net m2')
                        ->integer(),

                    TextInput::make('gross_area')
                        ->label('Brüt m2')
                        ->integer(),

                    CheckboxList::make('features')
                        ->label('Özelliklerler')
                        ->relationship('features')
                        ->required()
                        ->options(function (callable $get) {
                            $categoryId = $get('category_id');
                            if (! $categoryId) {
                                return [];
                            }

                            return Feature::with('group')->where('category_id', $categoryId)
                                ->get()
                                ->pluck('formattedName', 'id')
                                ->toArray();
                        })
                        ->columns(3)
                        ->visible(function (callable $get) {
                            return ! is_null($get('category_id'));
                        }),

                    LocationPicker::make('location')
                        ->afterStateUpdated(function (string $state) {})
                        ->label('Konum')
                        ->columnSpanFull(),

                ]
            );
    }

    public static function table(Table $table): Table
    {
        $categories = Category::isRoot()->get()->pluck('name', 'id');

        return $table
            ->columns([
                TextColumn::make('title')->label('Başlık')
                    ->searchable(),

                TextColumn::make('price')
                    ->label('Fiyat (₺)')
                    ->sortable(),
                TextColumn::make('price_in_usd')
                    ->label('Fiyat ($)'),
                TextColumn::make('price_in_eur')
                    ->label('Fiyat (€)'),
                TextColumn::make('CategoryTree')->label('kategori'),

            ])
            ->filters([
                SelectFilter::make('Kategori')
                    ->query(function ($query, array $data) {
                        if (is_null($data['value'])) {
                            return $query;
                        }
                        $values = Category::find($data['value'])?->descendants->pluck('id');

                        if (! $values) {
                            return $query->whereIn('category_id', [$values]);
                        }
                        $query->whereIn('category_id', $values->toArray());
                    })
                    ->options($categories->toArray())
                    ->attribute('category_id'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRealEstates::route('/'),
            'create' => Pages\CreateRealEstate::route('/create'),
            'edit' => Pages\EditRealEstate::route('/{record}/edit'),
        ];
    }
}
