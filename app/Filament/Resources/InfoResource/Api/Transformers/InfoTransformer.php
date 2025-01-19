<?php
namespace App\Filament\Resources\InfoResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Info;

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
