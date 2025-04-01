<?php

namespace App\Filament\Resources\RealEstateResource\Api\Handlers;

use App\Filament\Resources\RealEstateResource;
use App\Filament\Resources\RealEstateResource\Api\Requests\CreateRealEstateRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = RealEstateResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create RealEstate
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateRealEstateRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}
