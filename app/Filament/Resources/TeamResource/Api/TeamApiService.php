<?php

namespace App\Filament\Resources\TeamResource\Api;

use App\Filament\Resources\TeamResource;
use Rupadana\ApiService\ApiService;

class TeamApiService extends ApiService
{
    protected static ?string $resource = TeamResource::class;

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
