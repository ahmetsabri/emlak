<?php
namespace App\Filament\Resources\DocumentsResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\DocumentsResource;
use Illuminate\Routing\Router;


class DocumentsApiService extends ApiService
{
    protected static string | null $resource = DocumentsResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
