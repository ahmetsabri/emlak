<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasTranslations;
    public $translatable = ['title_1', 'description_1', 'title_2', 'description_2', 'quote'];
}
