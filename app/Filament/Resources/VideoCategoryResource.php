<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoCategoryResource\Pages;
use App\Filament\Resources\VideoCategoryResource\RelationManagers;
use App\Models\VideoCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class VideoCategoryResource extends Resource
{
    //Video kategorileri

    protected static ?string $model = VideoCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Video Kategorileri';

    protected static ?string $modelLabel = 'Video Kategorisi';

    protected static ?string $pluralModelLabel = 'Video Kategorileri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                     Translate::make()->prefixLocaleLabel()
                        ->schema([
                            TextInput::make('name')
                                ->label('Kategori Adı')
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
                TextColumn::make('name')
                ->label('Kategori'),
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
            'index' => Pages\ManageVideoCategories::route('/'),
        ];
    }
}
