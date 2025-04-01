<?php

namespace App\Filament\Resources\RealEstateResource\Api;

use App\Filament\Resources\RealEstateResource;
use Rupadana\ApiService\ApiService;

class RealEstateApiService extends ApiService
{
    protected static ?string $resource = RealEstateResource::class;

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
