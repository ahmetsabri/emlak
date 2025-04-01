<?php

namespace App\Filament\Resources\InfoResource\Api\Handlers;

use App\Filament\Resources\InfoResource;
use App\Filament\Resources\InfoResource\Api\Requests\CreateInfoRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = InfoResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Info
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateInfoRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}
