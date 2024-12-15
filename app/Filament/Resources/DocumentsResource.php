<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentsResource\Pages;
use App\Filament\Resources\DocumentsResource\RelationManagers;
use App\Models\Customer;
use App\Models\Documents;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class DocumentsResource extends Resource
{
    protected static ?string $model = Documents::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';


    protected static ?string $navigationLabel = 'Belgeler';

    protected static ?string $modelLabel = 'Belge';

    protected static ?string $pluralModelLabel = 'Belgeler';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Belge adı')->placeholder('örnek: sozleşme, tapu ..')->required()->columnSpanFull(),

                Select::make('customer_id')->relationship('customer')->searchable()->required()->columnSpanFull()
                ->getSearchResultsUsing(fn (string $search): array => Customer::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id')->toArray()),

                FileUpload::make('path')->required()->acceptedFileTypes(['application/pdf','application/docx','image/*'])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name')->label('Müşteri'),
                TextColumn::make('name')->label('Belge')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('Download')
        ->label('İndir')
        ->action(fn ($record) => Storage::disk('public')->download($record->path))
        ->link()
        ->icon('heroicon-o-arrow-down-tray')
        ->color(Color::Indigo),

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
            'index' => Pages\ManageDocuments::route('/'),
        ];
    }
}
