<?php

namespace App\Filament\Resources\InfoResource\Api;

use App\Filament\Resources\InfoResource;
use Rupadana\ApiService\ApiService;

class InfoApiService extends ApiService
{
    protected static ?string $resource = InfoResource::class;

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
