<?php

namespace App\Filament\Resources\FormResource\Api\Handlers;

use App\Filament\Resources\FormResource;
use App\Filament\Resources\FormResource\Api\Requests\UpdateFormRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = FormResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Form
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateFormRequest $request)
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
