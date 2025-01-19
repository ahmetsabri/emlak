<?php

namespace App\Filament\Resources\GroupResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\GroupResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\GroupResource\Api\Transformers\GroupTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = GroupResource::class;


    /**
     * Show Group
     *
     * @param Request $request
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

        if (!$query) return static::sendNotFoundResponse();

        return new GroupTransformer($query);
    }
}
