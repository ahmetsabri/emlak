<?php

namespace App\Filament\Resources\InfoResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\InfoResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\InfoResource\Api\Transformers\InfoTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = InfoResource::class;


    /**
     * Show Info
     *
     * @param Request $request
     * @return InfoTransformer
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

        return new InfoTransformer($query);
    }
}
