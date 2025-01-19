<?php

namespace App\Filament\Resources\TeamResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\TeamResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\TeamResource\Api\Transformers\TeamTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = TeamResource::class;


    /**
     * Show Team
     *
     * @param Request $request
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

        if (!$query) return static::sendNotFoundResponse();

        return new TeamTransformer($query);
    }
}
