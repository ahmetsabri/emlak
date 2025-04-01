<?php

namespace App\Filament\Resources\LanguageResource\Api;

use App\Filament\Resources\LanguageResource;
use Rupadana\ApiService\ApiService;

class LanguageApiService extends ApiService
{
    protected static ?string $resource = LanguageResource::class;

    protected static string|array $routeMiddleware = []; // <-- your specific resource middlewares

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
