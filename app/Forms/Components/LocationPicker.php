<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    protected string $view = 'forms.components.location-picker';

    public $location = '';

    protected array $listeners = ['updateLocation'];

    public function updateLocation($location)
    {
        $this->location = $location;
    }
}
