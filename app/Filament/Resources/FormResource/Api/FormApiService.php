<?php

namespace App\Filament\Resources\FormResource\Api;

use App\Filament\Resources\FormResource;
use Rupadana\ApiService\ApiService;

class FormApiService extends ApiService
{
    protected static ?string $resource = FormResource::class;

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
