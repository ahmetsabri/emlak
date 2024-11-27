<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealEstateResource\Pages;
use App\Models\RealEstate;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;
use Filament\Forms\Set;

class RealEstateResource extends Resource
{
    protected static ?string $model = RealEstate::class;

    protected static ?string $navigationLabel = 'Gayrimenkul';

    protected static ?string $modelLabel = 'Gayrimenkul';

    protected static ?string $pluralModelLabel = 'Gayrimenkul';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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

                         Map::make('location')
                        ->label('Location')
                        ->columnSpanFull()
                        ->defaultLocation(latitude: 41.0082, longitude: 28.9784)
                        ->afterStateUpdated(function (Set $set, ?array $state): void {
                            $set('latitude', $state['lat']);
                            $set('longitude', $state['lng']);
                            $set('geojson', json_encode($state['geojson']));
                        })
                        ->afterStateHydrated(function ($state, $record, Set $set): void {
                            $set(
                                'location',
                                [
                                    'lat'     => $record?->latitude ?? '41.0082',
                                    'lng'     => $record?->longitude ?? '28.9784',
                                    'geojson' => json_decode(strip_tags($record?->description ?? ''))
                                ]
                            );
                        })
                        ->extraStyles([
                            'min-height: 150vh',
                            'border-radius: 50px'
                        ])
                        ->showMarker(true)
                        ->markerColor("#22c55eff")
                        ->showFullscreenControl()
                        ->showZoomControl()
                        ->draggable()
                        ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")


                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Başlık')
                ->searchable(),

                MoneyColumn::make('price')->label('Fiyat')
                ->locale('tr')
                ->separator('.')
                ->decimals(0)
                ->sortable(),

                TextColumn::make('CategoryTree')->label('kategori')

            ])
            ->filters([
                //
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
