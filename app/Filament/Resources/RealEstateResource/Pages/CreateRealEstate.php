<?php

namespace App\Filament\Resources\RealEstateResource\Pages;

use App\Filament\Resources\RealEstateResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRealEstate extends CreateRecord
{
    protected static string $resource = RealEstateResource::class;

    protected array $infos = [];

    protected function beforeCreate(): void
    {
        $this->infos = current($this->data['infos']);
        unset($this->data['infos']);
    }

    protected function afterCreate(): void
    {
        $record = $this->getRecord();
        $infos = [];
        foreach ($this->infos as $infoId => $value) {
            $infos[$infoId] = ['value' => $value];
        }
        $this->getRecord()->infos()->sync(($infos));
    }
}
