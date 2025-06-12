<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupResource\Pages;
use App\Models\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-s-folder-open';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Translate::make()->prefixLocaleLabel()
                        ->schema([
                            TextInput::make('name')
                                ->label(__('Group Name'))
                                ->placeholder(__('e.g., Facade, Neighborhood, Exterior Features, etc.'))
                                ->required(),
                        ])->columnSpanFull(),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Group Name'))
                    ->searchable(query: function ($query, array $data) {
                        dump($data);
                    }),
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
            'index' => Pages\ManageGroups::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Groups');
    }

    public static function getModelLabel(): string
    {
        return __('Group');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Groups');
    }
}
