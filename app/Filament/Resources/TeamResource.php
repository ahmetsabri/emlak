<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Ekip';

    protected static ?string $modelLabel = 'Ekip';

    protected static ?string $pluralModelLabel = 'Ekip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Ad Soyad')->required(),
                TextInput::make('email')->label('E-posta')->required()->email()->unique('users', 'email', ignoreRecord:true),
                TextInput::make('phone')->label('Telefon')->required(),

                    SpatieMediaLibraryFileUpload::make('images')
                        ->collection('users')
                        ->imageEditor()
                        ->columnSpanFull()
                        ->columns(8),
                Checkbox::make('team_member')->label('Panele erişimi ver')->reactive()->nullable()->columnSpanFull()->default(false),

                TextInput::make('password')
                    ->label('şifre')
                    ->requiredIfAccepted('team_member')
                    ->password()
                    ->minLength(6)
                    ->confirmed()
                    ->visible(fn (callable $get) => ($get('team_member')) == true),
                TextInput::make('password_confirmation')
                    ->label('şifre tekrarla')
                    ->requiredIfAccepted('team_member')
                    ->password()
                    ->minLength(6)
                ->dehydrated(0)
                    ->visible(fn (callable $get) => ($get('team_member')) == true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
