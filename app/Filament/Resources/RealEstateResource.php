<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealEstateResource\Pages;
use App\Forms\Components\LocationPicker;
use App\Models\Category;
use App\Models\County;
use App\Models\District;
use App\Models\Info;
use App\Models\RealEstate;
use App\RealestateStatus;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
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

    public static array $infos = [];

    public static function form(Form $form): Form
    {
        $statuses = array_column(RealestateStatus::cases(), 'value');
        $statuses = array_combine(array_column(RealestateStatus::cases(), 'value'), $statuses);

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

                    SelectTree::make('category_id')
                        ->label('Kategori')
                        ->relationship('category', 'name', 'parent_id')
                        ->searchable()
                        ->required()
                        ->defaultOpenLevel(3)
                        ->expandSelected()
                        ->reactive()
                        ->live()
                        ->columnSpanFull()
                        ->afterStateUpdated(fn (SelectTree $component) => $component
                            ->getContainer()
                            ->getComponent('infoFields')
                            ->getChildComponentContainer()
                            ->fill()),
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->columnSpanFull(),
                    Section::make('Bilgiler')
                        ->label('Bilgiler')
                        ->schema(fn (Get $get): array => self::prepareInfo($get('category_id')))
                        ->key('infoFields')
                        ->dehydrated(),

                    SpatieMediaLibraryFileUpload::make('images')
                        ->label(__('Images'))
                        ->reorderable()
                        ->collection('realestates')
                        ->imageEditor()
                        ->multiple()
                        ->responsiveImages(false)
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

                    TextInput::make('gross_area')
                        ->label(__('Gross Area (m²)'))
                        ->integer()
                        ->placeholder(__('Gross Area')),

                    Select::make('province_id')
                        ->label(__('Province'))
                        ->relationship('province', 'name')
                        ->searchable()
                        ->searchDebounce(100)
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('county_id', null);
                        })
                        ->placeholder(__('Select Province')),

                    Select::make('county_id')
                        ->label(__('County'))
                        ->relationship('county')
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
                        ->searchDebounce(200)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('district_id', null);
                        })
                        ->placeholder(__('Select County')),

                    Select::make('district_id')
                        ->label(__('Neighborhood/Village'))
                        ->options(function (callable $get) {
                            $countyId = $get('county_id');
                            return $countyId ? District::where('county_id', $countyId)->pluck('name', 'id') : [];
                        })
                        ->getSearchResultsUsing(function (string $search, callable $get) {
                            $countyId = $get('county_id');
                            return District::where('county_id', $countyId)
                                ->where('name', 'like', "%$search%")
                                ->pluck('name', 'id');
                        })
                        ->searchable()
                        ->searchDebounce(200)
                        ->placeholder(__('Select Neighborhood/Village')),

                    Select::make('status')
                        ->label(__('Status'))
                        ->options($statuses)
                        ->default(RealestateStatus::AVAILABLE->value)
                        ->selectablePlaceholder(false),

                    TextInput::make('3d_link')
                        ->label(__('3D Link'))
                        ->nullable()
                        ->url()
                        ->placeholder(__('3D Link URL')),

                    CheckboxList::make('features')
                        ->label(__('Features'))
                        ->relationship('features')
                        ->searchable()
                        ->required()
                        ->options(function (callable $get) {
                            $categoryId = $get('category_id');
                            if (!$categoryId) {
                                return [];
                            }
                            return Category::findOrFail($categoryId)
                                ->features
                                ->pluck('formattedName', 'id')
                                ->toArray();
                        })
                        ->columns(3)
                        ->columnSpanFull()
                        ->visible(function (callable $get) {
                            return !is_null($get('category_id'));
                        }),

                    LocationPicker::make('location')
                        ->label(__('Location'))
                        ->columnSpanFull(),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        $categories = Category::isRoot()->get()->pluck('name', 'id');
        $statuses = array_column(RealestateStatus::cases(), 'value');
        $statuses = array_combine(array_column(RealestateStatus::cases(), 'value'), $statuses);

        return $table
            ->reorderable('sort')
            ->columns([
                TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                TextColumn::make('price')
                    ->label(__('Price (₺)'))
                    ->sortable(),
                TextColumn::make('price_in_usd')
                    ->label(__('Price ($)')),
                TextColumn::make('price_in_eur')
                    ->label(__('Price (€)')),
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
