<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentsResource\Pages;
use App\Models\Customer;
use App\Models\Document;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class DocumentsResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Document Name'))
                    ->placeholder(__('e.g. contract, deed ...'))
                    ->required()
                    ->columnSpanFull(),

                Select::make('customer_id')
                ->label(__('Customer'))
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->required()
                    ->columnSpanFull()
                    ->preload()
                    ->getSearchResultsUsing(fn (string $search): array =>
                        Customer::where('name', 'like', "%{$search}%")
                            ->limit(50)
                            ->pluck('name', 'id')
                            ->toArray()),

                FileUpload::make('path')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'application/docx', 'image/*'])
                    ->columnSpanFull()
                    ->label(__('File')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name')->label(__('Customer')),
                TextColumn::make('name')->label(__('Document')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('Download')
                    ->label(__('Download'))
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

    public static function getNavigationLabel(): string
    {
        return __('Documents');
    }

    public static function getModelLabel(): string
    {
        return __('Document');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Documents');
    }
}
