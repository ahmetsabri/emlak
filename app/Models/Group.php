<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Group extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
