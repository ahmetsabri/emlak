<?php

namespace App\Filament\Resources\TodoResource\Api\Transformers;

use App\Models\Todo;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Todo $resource
 */
class TodoTransformer extends JsonResource
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
