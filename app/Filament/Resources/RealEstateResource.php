<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealEstateResource\Pages;
use App\Forms\Components\LocationPicker;
use App\Forms\Components\RealestateInfosInput;
use App\Models\Category;
use App\Models\County;
use App\Models\District;
use App\Models\Info;
use App\Models\RealEstate;
use App\RealestateStatus;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
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

    protected static ?string $navigationLabel = 'İlanlar';

    protected static ?string $modelLabel = 'İlan';

    protected static ?string $pluralModelLabel = 'İlanlar';

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';

    protected static array $infos = [];

    public static function form(Form $form): Form
    {
        $statuses = array_column(RealestateStatus::cases(), 'value');
        $statuses = array_combine(array_column(RealestateStatus::cases(), 'value'), $statuses);

        return $form
            ->schema(
                [

                    Translate::make()->prefixLocaleLabel()
                        ->schema([
                            TextInput::make('title')->label('Başlık')->required()->columnSpanFull(),
                            RichEditor::make('description')->label('Açıklama')->required()->columnSpanFull(),
                        ])->columnSpanFull()->contained(false),

                    SelectTree::make('category_id')
                        ->label('Kategori')
                        ->relationship('category', 'name', 'parent_id')
                        ->searchable()
                        ->required()
                        ->defaultOpenLevel(3)
                        ->expandSelected()
                        ->reactive()
                        ->afterStateUpdated(function (callable $set, $state) {})
                        ->columnSpanFull(),

                    // Share data based on selected category
                    // list inputs
                    // resync after save
                    RealestateInfosInput::make('infos'),

                    Repeater::make('infos')
                        ->relationship('infos')
                        ->label('Bilgiler')
                        ->reorderable(false)
                        ->deletable(true)
                        ->columnSpanFull()
                        ->addable(false)
                        ->reactive()
                        ->schema(function (callable $get) {
                            if (! $get('category_id')) {
                                return [];
                            }

                            return self::prepareInfo($get('category_id'));
                        }),
                    SpatieMediaLibraryFileUpload::make('images')
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

                    TextInput::make('price')
                        ->label('Fiyat')
                        ->required(),

                    TextInput::make('net_area')
                        ->label('Net m2')
                        ->integer(),

                    TextInput::make('gross_area')
                        ->label('Brüt m2')
                        ->integer(),

                    Select::make('province_id')->label('il')->relationship('province', 'name')->searchable()
                        ->searchDebounce(100)->reactive() // This makes the field trigger updates on change
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('county_id', null);
                        })
                        ->preload(),

                    Select::make('county_id')
                        ->preload()
                        ->label('İlçe')
                        ->relationship('county')
                        ->options(function (callable $get) {
                            $provinceId = $get('province_id');

                            if ($provinceId) {
                                return County::where('province_id', $provinceId)->pluck('name', 'id');
                            }

                            return [];
                        })
                        ->getSearchResultsUsing(function (string $search, callable $get) {
                            $provinceId = $get('province_id');

                            return County::where('province_id', $provinceId)->where('name', 'like', "%$search%")->pluck('name', 'id');
                        })
                        ->reactive()
                        ->searchable()
                        ->searchDebounce(200)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('district_id', null);
                        }),

                    Select::make('district_id')
                        ->preload()
                        ->label('Mahalle / Köy')
                        ->options(function (callable $get) {
                            $countyId = $get('county_id');

                            if ($countyId) {
                                return District::where('county_id', $countyId)->pluck('name', 'id');
                            }

                            return [];
                        })->getSearchResultsUsing(function (string $search, callable $get) {
                            $countyId = $get('county_id');

                            return District::where('county_id', $countyId)->where('name', 'like', "%$search%")->pluck('name', 'id');
                        })->searchable()->searchDebounce(200),

                    Select::make('status')->label('Durum')->options(
                        $statuses
                    )->default(RealestateStatus::AVAILABLE->value)->selectablePlaceholder(false),
                    TextInput::make('3d_link')
                        ->label('3D linki')
                        ->nullable()
                        ->url(),

                    CheckboxList::make('features')
                        ->label('Özelliklerler')
                        ->relationship('features')
                        ->required()
                        ->options(function (callable $get) {
                            $categoryId = $get('category_id');
                            if (! $categoryId) {
                                return [];
                            }
                            $category = Category::findOrFail($categoryId)->load('features');

                            return $category->features
                                ->pluck('formattedName', 'id')
                                ->toArray();
                        })
                        ->columns(3)
                        ->columnSpanFull()
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

        $statuses = array_column(RealestateStatus::cases(), 'value');
        $statuses = array_combine(array_column(RealestateStatus::cases(), 'value'), $statuses);

        return $table
            ->reorderable('sort')
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
                SelectColumn::make('status')->label('Durum')
                    ->options($statuses)
                    ->selectablePlaceholder(false)
                    ->afterStateUpdated(function ($record, $state) {
                        return Notification::make()
                            ->title('Durum Güncellendi')
                            ->success()
                            ->send();
                    }),

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
                ActionGroup::make([
                    Tables\Actions\EditAction::make()->color('primary'),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ReplicateAction::make('copy')
                        ->label('Kopyala')
                        ->color(Color::Indigo)
                        ->modal(false)
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Kopyalandı')
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

    public static function prepareInfo(?int $categoryId): array
    {
        $infos = Info::whereRelation('categories', 'category_id', '=', $categoryId)
            ->get();
        if (! $infos) {
            return [];
        }
        $schema = [];
        foreach ($infos as $info) {
            if ($info->values) {
                $schema[] = Select::make($info->id)
                    ->options($info->values)
                    ->label($info->name)
                    ->selectablePlaceholder(false);

                continue;
            }
            $schema[] = TextInput::make($info->id)->label($info->name);
        }

        return $schema;
    }
}
