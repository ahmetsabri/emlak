<?php

namespace App\Filament\Resources\RealEstateResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\RealEstateResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\RealEstateResource\Api\Transformers\RealEstateTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = RealEstateResource::class;


    /**
     * Show RealEstate
     *
     * @param Request $request
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

        if (!$query) return static::sendNotFoundResponse();

        return new RealEstateTransformer($query);
    }
}
