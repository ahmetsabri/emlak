<?php

namespace App\Filament\Resources\RealEstateResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\RealEstateResource;
use App\Filament\Resources\RealEstateResource\Api\Transformers\RealEstateTransformer;

class PaginationHandler extends Handlers
{
    public static string | null $uri = '/';
    public static string | null $resource = RealEstateResource::class;

    public static bool $public = true;

    /**
     * List of RealEstate
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function handler()
    {
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for($query)
            ->with('category.parent.parent', 'province', 'county', 'district')
            ->allowedFields($this->getAllowedFields() ?? [])
            ->allowedSorts($this->getAllowedSorts() ?? [])
            ->allowedFilters($this->getAllowedFilters() ?? [])
            ->allowedIncludes($this->getAllowedIncludes() ?? [])
            ->paginate(request()->query('per_page'))
            ->appends(request()->query());

        return RealEstateTransformer::collection($query);
    }
}
