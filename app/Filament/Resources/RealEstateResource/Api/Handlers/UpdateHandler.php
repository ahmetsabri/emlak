<?php

namespace App\Filament\Resources\RealEstateResource\Api\Handlers;

use App\Filament\Resources\RealEstateResource;
use App\Filament\Resources\RealEstateResource\Api\Requests\UpdateRealEstateRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = RealEstateResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update RealEstate
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateRealEstateRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (! $model) {
            return static::sendNotFoundResponse();
        }

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Update Resource');
    }
}
