<?php
namespace App\Filament\Resources\RealEstateResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\RealEstateResource;
use App\Filament\Resources\RealEstateResource\Api\Requests\CreateRealEstateRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = RealEstateResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create RealEstate
     *
     * @param CreateRealEstateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateRealEstateRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}