<?php
namespace App\Filament\Resources\TodoResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\TodoResource;
use App\Filament\Resources\TodoResource\Api\Requests\CreateTodoRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = TodoResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Todo
     *
     * @param CreateTodoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateTodoRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}