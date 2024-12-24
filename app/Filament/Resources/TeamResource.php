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

    protected static ?string $navigationLabel = 'Ekip';

    protected static ?string $modelLabel = 'Ekip üyesi';

    protected static ?string $pluralModelLabel = 'Ekip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Ad Soyad')->required(),
                TextInput::make('email')->label('E-posta')->required()->email()->unique('users', 'email', ignoreRecord: true),
                TextInput::make('phone')->label('Telefon')->required(),
                TextInput::make('ttyb_no')->label('TTYP NO')->nullable(),

                SpatieMediaLibraryFileUpload::make('images')
                    ->label('Resim')
                    ->collection('users')
                    ->imageEditor()
                    ->columnSpanFull()
                    ->columns(8),

                //todo: check plan
                Checkbox::make('team_member')->label('Panele erişimi ver')->reactive()->nullable()->columnSpanFull()->default(false),

                Select::make('permissions')
                    ->label('Yetkiller')
                    ->relationship(name: 'permissions', titleAttribute: 'translated_name')
                    ->saveRelationshipsUsing(function (User $record, $state) {
                        $record->permissions()->sync($state);
                    })
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->requiredIfAccepted('team_member')
                    ->visible(fn (callable $get) => ($get('team_member')) == true),

                TextInput::make('password')
                    ->label('Şifre')
                    ->requiredIfAccepted('team_member')
                    ->password()
                    ->minLength(6)
                    ->confirmed()
                    ->visible(fn (callable $get) => ($get('team_member')) == true),

                TextInput::make('password_confirmation')
                    ->label('Şifre Tekrarla')
                    ->requiredIfAccepted('team_member')
                    ->password()
                    ->minLength(6)
                    ->dehydrated(0)
                    ->visible(fn (callable $get) => ($get('team_member')) == true),

                // CheckboxList::make('permissions')
                //     ->label('Yetkiller')
                //     ->relationship('permissions', 'translated_name', function ($query) {
                //         return $query->orderBy('id', 'asc');
                //     })
                //     ->debounce(null)
                //     ->columns(4)
                //     ->columnSpanFull()
                //     ->selectAllAction(
                //         fn (Action $action) => $action->label('aaaa all technologies'),
                //     )
                //     ->searchable(),

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
                TextColumn::make('name')->label('Ad Soyad')->searchable(),
                TextColumn::make('email')->label('E-post')->searchable(),
                TextColumn::make('phone')->label('Telefon')->searchable(),
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
