<?php

namespace App\Filament\Resources\GroupResource\Api\Transformers;

use App\Models\Group;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Group $resource
 */
class GroupTransformer extends JsonResource
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
