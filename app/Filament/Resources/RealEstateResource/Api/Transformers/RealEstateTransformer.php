<?php

namespace App\Filament\Resources\RealEstateResource\Api\Transformers;

use App\Models\RealEstate;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property RealEstate $resource
 */
class RealEstateTransformer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->setAppends([])->toArray();
    }
}
