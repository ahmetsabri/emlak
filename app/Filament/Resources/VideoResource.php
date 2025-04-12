<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Filament\Resources\VideoResource\RelationManagers;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                     Translate::make()->prefixLocaleLabel()
                        ->schema([
                            TextInput::make('title')
                                ->label('Başlık')
                                ->required(),
                        ])->columnSpanFull()
                        ->contained(false)
                        ->prefixLocaleLabel(true),
                        Select::make('video_category_id')
                            ->relationship('category', 'name')
                            ->label('Kategori')
                            ->required()
                            ->placeholder('Kategori Seçiniz')->columnSpanFull(),
                          TextInput::make('url')
                            ->label('link')
                            ->required()
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=example')->columnSpanFull()
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Başlık')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('category.name')->label('Kategori')

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
            'index' => Pages\ManageVideos::route('/'),
        ];
    }
}
