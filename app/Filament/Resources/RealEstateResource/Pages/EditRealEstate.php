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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        foreach ($data['formatted_infos'] as $key => $value) {
            $data[$key] = $value;
        }
        unset($data['formatted_infos']);

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $mainData = collect($data)->except('images');

        $record->update($mainData->toArray());

        $infos = [];

        foreach ($data as $key => $value) {
            if (str_contains($key, 'info_')) {
                $infos[str($key)->afterLast('_')->value()] = ['value' => $value];
            }
        }

        $record->infos()->sync(($infos));

        return $record;
    }
}
