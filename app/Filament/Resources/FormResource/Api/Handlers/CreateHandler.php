<?php

namespace App\Filament\Resources\FormResource\Api\Handlers;

use App\Filament\Resources\FormResource;
use App\Filament\Resources\FormResource\Api\Requests\CreateFormRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = FormResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Form
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateFormRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}
