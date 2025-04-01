<?php

namespace App\Filament\Resources\TodoResource\Api\Handlers;

use App\Filament\Resources\TodoResource;
use App\Filament\Resources\TodoResource\Api\Requests\UpdateTodoRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = TodoResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Todo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateTodoRequest $request)
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
