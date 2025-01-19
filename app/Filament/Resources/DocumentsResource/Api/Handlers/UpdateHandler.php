<?php
namespace App\Filament\Resources\DocumentsResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\DocumentsResource;
use App\Filament\Resources\DocumentsResource\Api\Requests\UpdateDocumentsRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = DocumentsResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Documents
     *
     * @param UpdateDocumentsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateDocumentsRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}