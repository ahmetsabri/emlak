<?php

namespace App\Filament\Resources\GroupResource\Api\Handlers;

use App\Filament\Resources\GroupResource;
use App\Filament\Resources\GroupResource\Api\Requests\CreateGroupRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = GroupResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Group
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateGroupRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}
