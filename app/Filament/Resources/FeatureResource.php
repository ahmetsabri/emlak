<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeatureResource\Pages;
use App\Models\Feature;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class FeatureResource extends Resource
{
    protected static ?int $order = 10;

    protected static ?string $model = Feature::class;

    protected static ?string $navigationIcon = 'heroicon-s-sparkles';

    protected static ?string $navigationLabel = 'Özelliklerler';

    protected static ?string $modelLabel = 'Özellik';

    protected static ?string $pluralModelLabel = 'Özelliklerler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [

                    SelectTree::make('category_id')
                        ->label('Kategori')
                        ->relationship('category', 'name', 'parent_id')
                        ->withCount()
                        ->searchable()
                        ->required()
                        ->columnSpanFull(),

                    Select::make('group_id')
                        ->label('Grup')
                        ->relationship('group', 'name')
                        ->required()
                        ->columnSpanFull(),

                    Translate::make()
                        ->schema([
                            TextInput::make('name')
                                ->label('Özellik Adı')
                                ->required(),
                        ])->columnSpanFull(),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Ad')->searchable(),
                TextColumn::make('CategoryTree')->label('Kategori'),
                TextColumn::make('group.name')->label('Grup'),

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageFeatures::route('/'),
        ];
    }

    public static function modifyGlobalSearchQuery(Builder $query, string $search): void
    {
        dump($search);
    }
}
