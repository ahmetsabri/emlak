<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Filament\Resources\CategoryResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;

class ChildrenRelationManager extends RelationManager
{
    protected static string $relationship = 'children';

    protected static ?string $navigationLabel = 'Kategoriler';

    protected static ?string $modelLabel = 'Kategori';

    protected static ?string $pluralModelLabel = 'Kategoriler';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return 'Alt Kategoriler';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Translate::make()->prefixLocaleLabel()
                    ->schema([
                        TextInput::make('name')->label('Kategori Adı')->required(),
                    ])->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        $parent = $this->getOwnerRecord()?->parent;

        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->visible($parent?->parent_id == null),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->url($parent?->parent_id != null ? null : fn ($record) => CategoryResource::getUrl('edit-child', [
                    'parent' => $this->getOwnerRecord()->id,
                    'record' => $record->id,
                ]))->modal(true),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
