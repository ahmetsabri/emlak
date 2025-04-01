<?php

namespace App\Filament\Resources\TodoResource\Api\Handlers;

use App\Filament\Resources\TodoResource;
use App\Filament\Resources\TodoResource\Api\Requests\CreateTodoRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = TodoResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Todo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateTodoRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}
