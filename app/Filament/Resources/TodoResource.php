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
    protected static ?string $model = Todo::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label(__('Title'))->required()->columnSpanFull(),
                Textarea::make('description')->label(__('Description'))->nullable()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $statuses = array_column(TodoStatus::cases(), 'value');
        $statuses = array_combine(array_column(TodoStatus::cases(), 'value'), $statuses);

        return $table
            ->columns([
                TextColumn::make('title')->label(__('Title'))->searchable(),
                TextColumn::make('description')->label(__('Description'))->searchable()->limit(100),
                SelectColumn::make('status')->label(__('Status'))
                    ->options($statuses)
                    ->selectablePlaceholder(false)
                    ->afterStateUpdated(function ($record, $state) {
                        return Notification::make()
                            ->title(__('Status Updated'))
                            ->success()
                            ->send();
                    }),
                TextColumn::make('created_at')->label(__('Created At'))->sortable(),
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

    public static function getNavigationLabel(): string
    {
        return __('Tasks');
    }

    public static function getModelLabel(): string
    {
        return __('Task');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Tasks');
    }
}
