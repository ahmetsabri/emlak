<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $appends = ['formatted_date', 'formatted_name'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function casts(): array
    {
        return [
            'show_name' => 'bool',
        ];
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->toDateString();
    }

    public function getFormattedNameAttribute()
    {
        return $this->show_name ? $this->name : str()->mask($this->name, '*', 1, strlen($this->name) - 2);
    }
}
