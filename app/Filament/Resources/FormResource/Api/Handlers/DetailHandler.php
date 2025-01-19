<?php

namespace App\Filament\Resources\FormResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\FormResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\FormResource\Api\Transformers\FormTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = FormResource::class;


    /**
     * Show Form
     *
     * @param Request $request
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

        if (!$query) return static::sendNotFoundResponse();

        return new FormTransformer($query);
    }
}
