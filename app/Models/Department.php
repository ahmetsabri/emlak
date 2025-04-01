<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    //users relation
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
