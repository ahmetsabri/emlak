<?php

namespace App\Filament\Resources\DocumentsResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\DocumentsResource;
use App\Filament\Resources\DocumentsResource\Api\Requests\CreateDocumentsRequest;

class CreateHandler extends Handlers
{
    public static string | null $uri = '/';
    public static string | null $resource = DocumentsResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    /**
     * Create Documents
     *
     * @param CreateDocumentsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateDocumentsRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->validated());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}
