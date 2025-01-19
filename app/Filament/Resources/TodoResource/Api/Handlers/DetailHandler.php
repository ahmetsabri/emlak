<?php

namespace App\Filament\Resources\TodoResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\TodoResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\TodoResource\Api\Transformers\TodoTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = TodoResource::class;


    /**
     * Show Todo
     *
     * @param Request $request
     * @return TodoTransformer
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

        return new TodoTransformer($query);
    }
}
