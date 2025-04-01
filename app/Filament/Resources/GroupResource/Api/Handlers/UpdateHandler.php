<?php

namespace App\Filament\Resources\GroupResource\Api\Handlers;

use App\Filament\Resources\GroupResource;
use App\Filament\Resources\GroupResource\Api\Requests\UpdateGroupRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = GroupResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Group
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateGroupRequest $request)
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
