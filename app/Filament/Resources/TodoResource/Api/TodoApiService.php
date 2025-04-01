<?php

namespace App\Filament\Resources\TodoResource\Api;

use App\Filament\Resources\TodoResource;
use Rupadana\ApiService\ApiService;

class TodoApiService extends ApiService
{
    protected static ?string $resource = TodoResource::class;

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
