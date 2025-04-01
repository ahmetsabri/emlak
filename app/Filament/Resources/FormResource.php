<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormResource\Pages;
use App\Models\Form as FormModel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FormResource extends Resource
{
    protected static ?string $model = FormModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Ad Soyad')->readOnly()->columnSpanFull(),
                TextInput::make('email')->label('E-posta')->readOnly()->columnSpanFull(),
                TextInput::make('phone')->label('Telefon')->readOnly()->columnSpanFull(),
                TextInput::make('province')->label('İl')->readOnly()->columnSpanFull(),
                TextInput::make('county')->label('İlçe')->readOnly()->columnSpanFull(),
                Textarea::make('note')->label('Açıklama')->readOnly()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginationPageOptions([10, 20, 30])
            ->columns([
                TextColumn::make('name')->label('Ad')->searchable(),
                TextColumn::make('email')->label('E-Posta')->searchable(),
                TextColumn::make('phone')->label('Telefon')->searchable(),
                TextColumn::make('province')->label('İl')->searchable(),
                TextColumn::make('county')->label('İlçe')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modal()->label('Detay')
                    ->modalHeading('Detaylar'),
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
            'index' => Pages\ListForms::route('/'),
        ];
    }
}
