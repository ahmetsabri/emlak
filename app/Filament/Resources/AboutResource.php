<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $navigationLabel = 'Hakkımızda';

    protected static ?string $modelLabel = 'Hakkımızda';

    protected static ?string $pluralModelLabel = 'Hakkımızda';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                     Translate::make()->prefixLocaleLabel()
                        ->schema([
                                           Forms\Components\TextInput::make('title_1')->label('Başlık 1')
                    ->required(),
                Forms\Components\TextInput::make('description_1')->label('Açıklama 1')
                    ->required(),
                Forms\Components\TextInput::make('title_2')->label('Başlık 2')
                    ->required(),
                Forms\Components\TextInput::make('description_2')->label('Açıklama 2')
                    ->required(),
                Forms\Components\TextInput::make('quote')->label('Alıntı')
                    ->required(),

                        ])->columnSpanFull()
                        ->contained(false)
                        ->prefixLocaleLabel(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quote')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        $pages =  [
            'index' => Pages\ListAbouts::route('/'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
            'create' => Pages\CreateAbout::route('/create'),
        ];



        return $pages;
    }

       public static function canCreate(): bool
   {
      return About::count() === 0;
   }
}
