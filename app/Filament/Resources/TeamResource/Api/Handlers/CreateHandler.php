<?php
namespace App\Filament\Resources\TeamResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\TeamResource;
use App\Filament\Resources\TeamResource\Api\Requests\CreateTeamRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = TeamResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Team
     *
     * @param CreateTeamRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateTeamRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}