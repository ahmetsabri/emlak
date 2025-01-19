<?php
namespace App\Filament\Resources\FeatureResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Feature;

/**
 * @property Feature $resource
 */
class FeatureTransformer extends JsonResource
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
