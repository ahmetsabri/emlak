<?php

namespace App\Filament\Resources\FeatureResource\Api\Handlers;

use App\Filament\Resources\FeatureResource;
use App\Filament\Resources\FeatureResource\Api\Requests\CreateFeatureRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = FeatureResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Feature
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateFeatureRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}
