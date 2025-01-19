<?php
namespace App\Filament\Resources\FeatureResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\FeatureResource;
use Illuminate\Routing\Router;


class FeatureApiService extends ApiService
{
    protected static string | null $resource = FeatureResource::class;

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
