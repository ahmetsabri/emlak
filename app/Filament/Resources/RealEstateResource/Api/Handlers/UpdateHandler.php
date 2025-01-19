<?php
namespace App\Filament\Resources\RealEstateResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\RealEstateResource;
use App\Filament\Resources\RealEstateResource\Api\Requests\UpdateRealEstateRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = RealEstateResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update RealEstate
     *
     * @param UpdateRealEstateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateRealEstateRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}