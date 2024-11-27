<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    public static function booted()
    {
        static::created(function ($model) {
            cache()->forget('exchange:rate');
            cache()->remember('exchange:rate', now()->endOfDay(), function () use ($model) {
                return $model;
            });
        });
    }
}
