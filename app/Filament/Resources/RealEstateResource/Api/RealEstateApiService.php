<?php
namespace App\Filament\Resources\RealEstateResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\RealEstateResource;
use Illuminate\Routing\Router;


class RealEstateApiService extends ApiService
{
    protected static string | null $resource = RealEstateResource::class;

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
