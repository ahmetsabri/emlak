<?php

namespace App\Filament\Resources\RealEstateResource\Pages;

use App\Filament\Resources\RealEstateResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRealEstate extends CreateRecord
{
    protected static string $resource = RealEstateResource::class;

    protected array $infos = [];

    protected function afterValidate(): void
    {
        foreach ($this->data as $key => $value) {
            if (str_contains($key, 'info_')) {
                $this->infos[str($key)->afterLast('_')->value()] = $value;
                unset($this->data[$key]);
            }
        }
    }

    protected function afterCreate(): void
    {
        $infos = [];
        foreach ($this->infos as $infoId => $value) {
            $infos[$infoId] = ['value' => $value];
        }
        $this->getRecord()->infos()->sync(($infos));
    }
}
