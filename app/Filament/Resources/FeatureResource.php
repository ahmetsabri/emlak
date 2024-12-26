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
                    Translate::make()->prefixLocaleLabel()
                        ->schema([
                            TextInput::make('name')
                                ->label('Özellik Adı')
                                ->required(),
                        ])->columnSpanFull()
                        ->contained(false)
                        ->prefixLocaleLabel(true),

                    Select::make('group_id')
                        ->label('Grup')
                        ->relationship('group', 'name')
                        ->required()
                        ->columnSpanFull(),

                    SelectTree::make('categories')
                        ->label('Kategoriler')
                        ->relationship('categories', 'name', 'parent_id')
                        ->searchable()
                        ->required()
                        ->dehydrated(false)
                        ->columnSpanFull(),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Ad')->searchable(),
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
}
