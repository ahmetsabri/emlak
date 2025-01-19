<?php
namespace App\Filament\Resources\TodoResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\TodoResource;
use Illuminate\Routing\Router;


class TodoApiService extends ApiService
{
    protected static string | null $resource = TodoResource::class;

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
