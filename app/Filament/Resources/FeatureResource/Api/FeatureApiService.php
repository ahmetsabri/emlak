<?php

namespace App\Filament\Resources\FeatureResource\Api;

use App\Filament\Resources\FeatureResource;
use Rupadana\ApiService\ApiService;

class FeatureApiService extends ApiService
{
    protected static ?string $resource = FeatureResource::class;

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
