<?php

namespace App\Filament\Resources\DocumentsResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Documents $resource
 */
class DocumentsTransformer extends JsonResource
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
