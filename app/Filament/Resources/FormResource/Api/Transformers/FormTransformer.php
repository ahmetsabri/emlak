<?php

namespace App\Filament\Resources\FormResource\Api\Transformers;

use App\Models\Form;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Form $resource
 */
class FormTransformer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
