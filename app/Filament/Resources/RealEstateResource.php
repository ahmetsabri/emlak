<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealEstateResource\Pages;
use App\Forms\Components\LocationPicker;
use App\Models\Category;
use App\Models\County;
use App\Models\Feature;
use App\Models\RealEstate;
use App\RealestateStatus;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class RealEstateResource extends Resource
{
    protected static ?string $model = RealEstate::class;

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';

    public static function form(Form $form): Form
    {
        $statuses = collect(RealestateStatus::cases())
            ->mapWithKeys(fn($s) => [$s->value => __($s->value)])
            ->toArray();

        return $form
            ->schema(
                [
                    Translate::make()->prefixLocaleLabel()
                        ->schema([
                            TextInput::make('title')
                                ->label(__('Title'))
                                ->required()
                                ->columnSpanFull()
                                ->placeholder(__('Title')),
                            RichEditor::make('description')
                                ->label(__('Description'))
                                ->required()
                                ->columnSpanFull()
                                ->placeholder(__('Description')),
                        ])->columnSpanFull()->contained(false),

                    SpatieMediaLibraryFileUpload::make('images')
                        ->label(__('Images'))
                        ->reorderable()
                        ->collection('realestates')
                        ->imageEditor()
                        ->multiple()
                        ->responsiveImages()
                        ->live()
                        ->columnSpanFull()
                        ->minFiles(1)
                        ->maxFiles(20)
                        ->panelLayout('grid'),

                    SelectTree::make('category_id')
                        ->label(__('Category'))
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
                        ->label(__('Price'))
                        ->required()
                        ->placeholder(__('Price')),

                    TextInput::make('net_area')
                        ->label(__('Net Area (m²)'))
                        ->integer()
                        ->placeholder(__('Net Area')),

                    Select::make('province_id')
                        ->label(__('Province'))
                        ->relationship('province', 'name')
                        ->searchable()
                        ->searchDebounce(100)
                        ->reactive()
                        ->preload()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('county_id', null);
                        })
                        ->placeholder(__('Select Province')),

                    Select::make('county_id')
                        ->label(__('County'))
                        ->relationship('county')
                        ->preload()
                        ->options(function (callable $get) {
                            $provinceId = $get('province_id');
                            return $provinceId ? County::where('province_id', $provinceId)->pluck('name', 'id') : [];
                        })
                        ->getSearchResultsUsing(function (string $search, callable $get) {
                            $provinceId = $get('province_id');
                            return County::where('province_id', $provinceId)
                                ->where('name', 'like', "%$search%")
                                ->pluck('name', 'id');
                        })
                        ->reactive()
                        ->searchable()
                        ->preload()
                        ->searchDebounce(200)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('district_id', null);
                        })
                        ->placeholder(__('Select County')),

                    TextInput::make('address')
                        ->label(__('Address'))
                        ->placeholder(__('Address'))
                        ->columnSpanFull(),

                    Select::make('status')
                        ->label(__('Status'))
                        ->options($statuses)
                        ->default(RealestateStatus::AVAILABLE->value)
                        ->selectablePlaceholder(false),

                    LocationPicker::make('location')
                        ->label(__('Location'))
                        ->columnSpanFull(),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        $categories = Category::isRoot()->get()->pluck('name', 'id');
        $statuses = collect(RealestateStatus::cases())
            ->mapWithKeys(fn($s) => [$s->value => __($s->value)])
            ->toArray();

        return $table
            ->reorderable('sort')
            ->columns([
                TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                TextColumn::make('price')
                    ->label(__('Price (₺)'))
                    ->sortable(),
                SelectColumn::make('status')
                    ->label(__('Status'))
                    ->options($statuses)
                    ->selectablePlaceholder(false)
                    ->afterStateUpdated(function ($record, $state) {
                        return Notification::make()
                            ->title(__('Status Updated'))
                            ->success()
                            ->send();
                    }),
                TextColumn::make('CategoryTree')
                    ->label(__('Category')),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label(__('Category'))
                    ->query(function ($query, array $data) {
                        if (empty($data['value'])) {
                            return $query;
                        }
                        $values = Category::find($data['value'])?->descendants->pluck('id');
                        return $values ? $query->whereIn('category_id', $values) : $query;
                    })
                    ->options($categories->toArray()),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->color('primary'),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ReplicateAction::make('copy')
                        ->label(__('Copy'))
                        ->color(Color::Indigo)
                        ->modal(false)
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title(__('Copied'))
                        ),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRealEstates::route('/'),
            'create' => Pages\CreateRealEstate::route('/create'),
            'edit' => Pages\EditRealEstate::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Listings');
    }

    public static function getModelLabel(): string
    {
        return __('Listing');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Listings');
    }
}
