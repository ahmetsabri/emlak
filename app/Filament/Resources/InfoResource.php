<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoResource\Pages;
use App\Models\Info;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class InfoResource extends Resource
{
    protected static ?string $model = Info::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'Bilgiler';

    protected static ?string $modelLabel = 'Bilgi';

    protected static ?string $pluralModelLabel = 'Bilgiler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Translate::make()->prefixLocaleLabel()
                        ->schema([
                            TextInput::make('name')
                                ->label('Bilgi Adı')
                                ->required(),
                        ])->columnSpanFull()
                        ->contained(false)
                        ->prefixLocaleLabel(true),

                    SelectTree::make('categories')
                        ->label('Kategoriler')
                        ->relationship('categories', 'name', 'parent_id')
                        ->searchable()
                        ->required()
                        ->independent(false)
                        ->expandSelected()
                        ->dehydrated(false)
                        ->columnSpanFull(),

                    TextInput::make('values')
                        ->label('Seçenekler')
                        ->placeholder('option1,option2')
                        ->columnSpanFull(),

                    Toggle::make('filterable')
                        ->label('Filtrelenebilir'),

                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Ad')->searchable(),
                ToggleColumn::make('filterable')->label('Filtrelenebilir'),

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
            'index' => Pages\ManageInfos::route('/'),
        ];
    }
}
