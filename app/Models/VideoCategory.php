<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class VideoCategory extends Model
{
    use HasTranslations;


    public $translatable = ['name'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
