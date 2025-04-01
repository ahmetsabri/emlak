<?php

namespace App\Filament\Resources\TeamResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Team $resource
 */
class TeamTransformer extends JsonResource
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
