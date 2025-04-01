<?php

namespace App\Filament\Resources\DocumentsResource\Api\Handlers;

use App\Filament\Resources\DocumentsResource;
use App\Filament\Resources\DocumentsResource\Api\Transformers\DocumentsTransformer;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = DocumentsResource::class;

    /**
     * Show Documents
     *
     * @return DocumentsTransformer
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

        return new DocumentsTransformer($query);
    }
}
