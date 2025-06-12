<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TeamResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Full Name'))
                    ->required()
                    ->placeholder(__('Full Name')),

                TextInput::make('email')
                    ->label(__('Email'))
                    ->required()
                    ->email()
                    ->unique('users', 'email', ignoreRecord: true)
                    ->placeholder(__('Email')),

                TextInput::make('phone')
                    ->label(__('Phone'))
                    ->required()
                    ->placeholder(__('Phone')),

                TextInput::make('ttyb_no')
                    ->label(__('TTYB Number'))
                    ->nullable()
                    ->placeholder(__('TTYB Number')),

                SpatieMediaLibraryFileUpload::make('images')
                    ->label(__('Image'))
                    ->collection('users')
                    ->imageEditor()
                    ->columnSpanFull()
                    ->columns(8),

                Checkbox::make('team_member')
                    ->label(__('Grant panel access'))
                    ->reactive()
                    ->nullable()
                    ->columnSpanFull()
                    ->default(false),

                // Select::make('permissions')
                //     ->label(__('Permissions'))
                //     ->relationship(name: 'permissions', titleAttribute: 'translated_name')
                //     ->saveRelationshipsUsing(function (User $record, $state) {
                //         $record->permissions()->sync($state);
                //     })
                //     ->multiple()
                //     ->preload()
                //     ->searchable()
                //     ->columnSpanFull()
                //     ->requiredIfAccepted('team_member')
                //     ->visible(fn (callable $get) => ($get('team_member')) == true),

                TextInput::make('password')
                    ->label(__('Password'))
                    ->requiredIfAccepted('team_member')
                    ->password()
                    ->minLength(6)
                    ->confirmed()
                    ->visible(fn (callable $get) => ($get('team_member')) == true)
                    ->placeholder(__('Password')),

                TextInput::make('password_confirmation')
                    ->label(__('Confirm Password'))
                    ->requiredIfAccepted('team_member')
                    ->password()
                    ->minLength(6)
                    ->dehydrated(0)
                    ->visible(fn (callable $get) => ($get('team_member')) == true)
                    ->placeholder(__('Confirm Password')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('id', '<>', auth()->id());
            })
            ->columns([
                SpatieMediaLibraryImageColumn::make('')->collection('users'),
                TextColumn::make('name')->label(__('Full Name'))->searchable(),
                TextColumn::make('email')->label(__('Email'))->searchable(),
                TextColumn::make('phone')->label(__('Phone'))->searchable(),
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

    public static function getNavigationLabel(): string
    {
        return __('Team');
    }

    public static function getModelLabel(): string
    {
        return __('Team Member');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Team');
    }
}
