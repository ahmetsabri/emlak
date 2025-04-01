<?php

namespace App\Filament\Resources\InfoResource\Api\Transformers;

use App\Models\Info;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Info $resource
 */
class InfoTransformer extends JsonResource
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
