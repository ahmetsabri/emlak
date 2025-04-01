<?php

namespace App\Filament\Resources\FeatureResource\Api\Handlers;

use App\Filament\Resources\FeatureResource;
use App\Filament\Resources\FeatureResource\Api\Requests\UpdateFeatureRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = FeatureResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Feature
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateFeatureRequest $request)
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
