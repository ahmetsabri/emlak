<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TodoResource\Pages;
use App\Models\Todo;
use App\TodoStatus;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TodoResource extends Resource
{
    // Görevleri
    protected static ?string $model = Todo::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = 'Görevler';

    protected static ?string $modelLabel = 'Görev';

    protected static ?string $pluralModelLabel = 'Görevler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Başlık')->required()->columnSpanFull(),
                Textarea::make('description')->label('Açıklama')->nullable()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $statuses = array_column(TodoStatus::cases(), 'value');
        $statuses = array_combine(array_column(TodoStatus::cases(), 'value'), $statuses);

        return $table
            ->columns([
                TextColumn::make('title')->label('Başlık')->searchable(),
                TextColumn::make('description')->label('Açıklama')->searchable()->limit(100),
                SelectColumn::make('status')->label('Durum')
                    ->options($statuses)
                    ->selectablePlaceholder(false)
                    ->afterStateUpdated(function ($record, $state) {
                        return Notification::make()
                            ->title('Durum Güncellendi')
                            ->success()
                            ->send();
                    }),
                TextColumn::make('created_at')->label('Oluşturma Tarihi')->sortable(),
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
            'index' => Pages\ManageTodos::route('/'),
        ];
    }
}
