<?php

namespace App\Filament\Resources\CustomerResource\Api\Transformers;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Customer $resource
 */
class CustomerTransformer extends JsonResource
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
