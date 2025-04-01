<?php

namespace App\Filament\Resources\TeamResource\Api\Handlers;

use App\Filament\Resources\TeamResource;
use App\Filament\Resources\TeamResource\Api\Requests\CreateTeamRequest;
use Rupadana\ApiService\Http\Handlers;

class CreateHandler extends Handlers
{
    public static ?string $uri = '/';

    public static ?string $resource = TeamResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Team
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateTeamRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, 'Successfully Create Resource');
    }
}
