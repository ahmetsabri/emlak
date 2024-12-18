<?php

namespace App\Filament\Resources\RealEstateResource\Pages;

use App\Filament\Resources\RealEstateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditRealEstate extends EditRecord
{
    protected static string $resource = RealEstateResource::class;

    public $location = '';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $mainData = collect($data)->except('images');

        $record->update($mainData->toArray());

        return $record;
    }
}
