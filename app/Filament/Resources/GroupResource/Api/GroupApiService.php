<?php

namespace App\Filament\Resources\GroupResource\Api;

use App\Filament\Resources\GroupResource;
use Rupadana\ApiService\ApiService;

class GroupApiService extends ApiService
{
    protected static ?string $resource = GroupResource::class;

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
