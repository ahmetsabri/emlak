<?php

namespace App\Filament\Resources\RealEstateResource\Api\Handlers;

use App\Filament\Resources\RealEstateResource;
use App\Filament\Resources\RealEstateResource\Api\Transformers\RealEstateTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = RealEstateResource::class;

    /**
     * Show RealEstate
     *
     * @return RealEstateTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');

        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (! $query) {
            return static::sendNotFoundResponse();
        }

        return new RealEstateTransformer($query);
    }
}
