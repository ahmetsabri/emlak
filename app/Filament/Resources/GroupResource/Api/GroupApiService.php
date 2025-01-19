<?php
namespace App\Filament\Resources\GroupResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\GroupResource;
use Illuminate\Routing\Router;


class GroupApiService extends ApiService
{
    protected static string | null $resource = GroupResource::class;

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
