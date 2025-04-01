<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    public static function booted()
    {
        static::saved(function ($model) {
            cache()->forget('exchange:rate');
            cache()->rememberForever('exchange:rate', function () use ($model) {
                return $model;
            });
        });
    }
}
