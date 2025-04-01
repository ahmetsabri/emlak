<?php

namespace App\Filament\Resources\TeamResource\Api\Handlers;

use App\Filament\Resources\TeamResource;
use App\Filament\Resources\TeamResource\Api\Transformers\TeamTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = TeamResource::class;

    /**
     * Show Team
     *
     * @return TeamTransformer
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

        return new TeamTransformer($query);
    }
}
