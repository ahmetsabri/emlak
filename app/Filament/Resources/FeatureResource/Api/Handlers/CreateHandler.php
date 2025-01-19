<?php
namespace App\Filament\Resources\FeatureResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\FeatureResource;
use App\Filament\Resources\FeatureResource\Api\Requests\CreateFeatureRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = FeatureResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Feature
     *
     * @param CreateFeatureRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateFeatureRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}