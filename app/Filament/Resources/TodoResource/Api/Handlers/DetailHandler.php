<?php

namespace App\Filament\Resources\TodoResource\Api\Handlers;

use App\Filament\Resources\TodoResource;
use App\Filament\Resources\TodoResource\Api\Transformers\TodoTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = TodoResource::class;

    /**
     * Show Todo
     *
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

        if (! $query) {
            return static::sendNotFoundResponse();
        }

        return new TodoTransformer($query);
    }
}
