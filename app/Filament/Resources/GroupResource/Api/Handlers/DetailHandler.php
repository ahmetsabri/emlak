<?php

namespace App\Filament\Resources\GroupResource\Api\Handlers;

use App\Filament\Resources\GroupResource;
use App\Filament\Resources\GroupResource\Api\Transformers\GroupTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = GroupResource::class;

    /**
     * Show Group
     *
     * @return GroupTransformer
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

        return new GroupTransformer($query);
    }
}
