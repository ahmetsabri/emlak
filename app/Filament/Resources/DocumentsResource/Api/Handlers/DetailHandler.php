<?php

namespace App\Filament\Resources\DocumentsResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\DocumentsResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\DocumentsResource\Api\Transformers\DocumentsTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = DocumentsResource::class;


    /**
     * Show Documents
     *
     * @param Request $request
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

        if (!$query) return static::sendNotFoundResponse();

        return new DocumentsTransformer($query);
    }
}
