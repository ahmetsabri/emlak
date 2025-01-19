<?php
namespace App\Filament\Resources\TeamResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\TeamResource;
use Illuminate\Routing\Router;


class TeamApiService extends ApiService
{
    protected static string | null $resource = TeamResource::class;

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
