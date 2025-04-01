<?php

namespace App\Filament\Resources\InfoResource\Api\Handlers;

use App\Filament\Resources\InfoResource;
use App\Filament\Resources\InfoResource\Api\Requests\UpdateInfoRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = InfoResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Info
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateInfoRequest $request)
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
