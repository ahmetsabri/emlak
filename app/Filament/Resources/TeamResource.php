<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
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
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class TeamResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Ekip';

    protected static ?string $modelLabel = 'Ekip üyesi';

    protected static ?string $pluralModelLabel = 'Ekip';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             TextInput::make('name')->label('Ad Soyad')->required(),
    //             TextInput::make('email')->label('E-posta')->required()->email()->unique('users', 'email', ignoreRecord: true),
    //             TextInput::make('phone')->label('Telefon')->required(),
    //             TextInput::make('ttyb_no')->label('TTYP NO')->nullable(),

    //             SpatieMediaLibraryFileUpload::make('images')
    //                 ->label('Resim')
    //                 ->collection('users')
    //                 ->imageEditor()
    //                 ->columnSpanFull()
    //                 ->columns(8),

    //             // todo: check plan
    //             Checkbox::make('team_member')->label('Panele erişimi ver')->reactive()->nullable()->columnSpanFull()->default(false),

    //             Select::make('permissions')
    //                 ->label('Yetkiller')
    //                 ->relationship(name: 'permissions', titleAttribute: 'translated_name')
    //                 ->saveRelationshipsUsing(function (User $record, $state) {
    //                     $record->permissions()->sync($state);
    //                 })
    //                 ->multiple()
    //                 ->preload()
    //                 ->searchable()
    //                 ->columnSpanFull()
    //                 ->requiredIfAccepted('team_member')
    //                 ->visible(fn (callable $get) => ($get('team_member')) == true),

    //             TextInput::make('password')
    //                 ->label('Şifre')
    //                 ->requiredIfAccepted('team_member')
    //                 ->password()
    //                 ->minLength(6)
    //                 ->confirmed()
    //                 ->visible(fn (callable $get) => ($get('team_member')) == true),

    //             TextInput::make('password_confirmation')
    //                 ->label('Şifre Tekrarla')
    //                 ->requiredIfAccepted('team_member')
    //                 ->password()
    //                 ->minLength(6)
    //                 ->dehydrated(0)
    //                 ->visible(fn (callable $get) => ($get('team_member')) == true),

    //             // CheckboxList::make('permissions')
    //             //     ->label('Yetkiller')
    //             //     ->relationship('permissions', 'translated_name', function ($query) {
    //             //         return $query->orderBy('id', 'asc');
    //             //     })
    //             //     ->debounce(null)
    //             //     ->columns(4)
    //             //     ->columnSpanFull()
    //             //     ->selectAllAction(
    //             //         fn (Action $action) => $action->label('aaaa all technologies'),
    //             //     )
    //             //     ->searchable(),

    //         ]);
    // }

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                // Name (Ad Soyad)
                TextInput::make('name')
                    ->label('Ad Soyad')
                    ->required()
                    ->maxLength(255),

                // TTYB No
                TextInput::make('ttyb_no')
                ->label('TTYB No')
                ->required()
                    ->maxLength(255),

                // Phone
                TextInput::make('phone')
                    ->label(__('general.phone'))
                    ->maxLength(255),

                // Email
                TextInput::make('email')
                    ->label(__('general.email'))
                    ->email()
                    ->maxLength(255),

                // Social Media URLs
                TextInput::make('facebook_url')
                    ->label(__('facebook'))
                    ->url()
                    ->maxLength(255),
                TextInput::make('instagram_url')
                    ->label(__('instagram'))
                    ->url()
                    ->maxLength(255),
                TextInput::make('whatsapp')
                    ->label(__('whatsapp'))
                    ->maxLength(255),
                TextInput::make('youtube')
                    ->label(__('youtube'))
                    ->url()
                    ->maxLength(255),
                TextInput::make('linkedin')
                    ->label(__('linkedin'))
                    ->url()
                    ->maxLength(255),

                // Office Location
                TextInput::make('office_location')
                    ->label(__('general.office') . ' Konumu')
                    ->maxLength(255),

                // Address
                TextInput::make('address')
                    ->label(__('general.address') . ' Bilgileri')
                    ->maxLength(255),

                // Experience
                TextInput::make('experience')
                    ->label(__('general.experience'))
                    ->placeholder('exp1, exp2, exp3')
                    ->maxLength(255),

                // Experience Area
                TextInput::make('experience_area')
                    ->label(__('general.experience_area'))
                    ->placeholder('exp1, exp2, exp3')
                    ->maxLength(255),

                // Languages
                TextInput::make('languages')
                    ->label('Diller')
                    ->placeholder('turkish, english')
                    ->maxLength(255),

                // Department (Select)
                Select::make('department_id')
                    ->label('Departman')
                    ->relationship('department', 'name') // Assumes a Department relationship exists
                    ->required()
                    ->options(function () {
                        return \App\Models\Department::pluck('name', 'id')->toArray();
                    })
                    ->default(fn ($livewire) => \App\Models\Department::first()->id ?? null),

                SpatieMediaLibraryFileUpload::make('images')
                    ->label('Resim')
                    ->collection('users')
                    ->imageEditor(),

                         Translate::make()->prefixLocaleLabel()
                    ->schema([
                        RichEditor::make('bio'),
                        TextInput::make('title')
                            ->label('Başlık')
                            ->required(),

                    ])
                    ->contained(true)
                    ->prefixLocaleLabel(true)->columnSpanFull(),



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
                TextColumn::make('department.name')->label('Departman')->searchable(),
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
