<?php
namespace App\Filament\Resources\InfoResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\InfoResource;
use Illuminate\Routing\Router;


class InfoApiService extends ApiService
{
    protected static string | null $resource = InfoResource::class;

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
