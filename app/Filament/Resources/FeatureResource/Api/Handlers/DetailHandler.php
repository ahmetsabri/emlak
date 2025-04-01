<?php

namespace App\Filament\Resources\FeatureResource\Api\Handlers;

use App\Filament\Resources\FeatureResource;
use App\Filament\Resources\FeatureResource\Api\Transformers\FeatureTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = FeatureResource::class;

    /**
     * Show Feature
     *
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

        if (! $query) {
            return static::sendNotFoundResponse();
        }

        return new FeatureTransformer($query);
    }
}
