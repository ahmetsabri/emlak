<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
