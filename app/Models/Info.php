<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Info extends Model
{
    /** @use HasFactory<\Database\Factories\InfoFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
