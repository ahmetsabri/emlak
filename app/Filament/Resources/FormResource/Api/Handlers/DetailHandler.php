<?php

namespace App\Filament\Resources\FormResource\Api\Handlers;

use App\Filament\Resources\FormResource;
use App\Filament\Resources\FormResource\Api\Transformers\FormTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = FormResource::class;

    /**
     * Show Form
     *
     * @return FormTransformer
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

        return new FormTransformer($query);
    }
}
