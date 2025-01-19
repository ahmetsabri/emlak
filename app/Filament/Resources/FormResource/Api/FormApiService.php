<?php
namespace App\Filament\Resources\FormResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\FormResource;
use Illuminate\Routing\Router;


class FormApiService extends ApiService
{
    protected static string | null $resource = FormResource::class;

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
