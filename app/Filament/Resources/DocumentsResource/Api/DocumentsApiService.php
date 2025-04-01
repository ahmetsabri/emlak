<?php

namespace App\Filament\Resources\DocumentsResource\Api;

use App\Filament\Resources\DocumentsResource;
use Rupadana\ApiService\ApiService;

class DocumentsApiService extends ApiService
{
    protected static ?string $resource = DocumentsResource::class;

    public static function handlers(): array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class,
        ];

    }
}
