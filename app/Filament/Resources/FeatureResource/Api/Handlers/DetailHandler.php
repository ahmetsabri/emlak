<?php

namespace App\Filament\Resources\FeatureResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\FeatureResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\FeatureResource\Api\Transformers\FeatureTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = FeatureResource::class;


    /**
     * Show Feature
     *
     * @param Request $request
     * @return FeatureTransformer
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

        return new FeatureTransformer($query);
    }
}
