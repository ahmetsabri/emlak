<?php
namespace App\Filament\Resources\GroupResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Group;

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
