<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
