<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /** @use HasFactory<\Database\Factories\LanguageFactory> */
    use HasFactory;

    public static function booted()
    {
        static::saved(function () {
            cache()->forget('supported_locales');
            cache()->rememberForever('supported_locales', function () {
                return Language::where('is_active', true)->get();
            });
        });

        static::deleted(function () {
            cache()->forget('supported_locales');
            cache()->rememberForever('supported_locales', function () {
                return Language::where('is_active', true)->get();
            });
        });
    }
}
