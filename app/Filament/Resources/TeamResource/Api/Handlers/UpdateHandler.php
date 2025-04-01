<?php

namespace App\Filament\Resources\TeamResource\Api\Handlers;

use App\Filament\Resources\TeamResource;
use App\Filament\Resources\TeamResource\Api\Requests\UpdateTeamRequest;
use Rupadana\ApiService\Http\Handlers;

class UpdateHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = TeamResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Update Team
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateTeamRequest $request)
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
