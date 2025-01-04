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

    public static function booted()
    {
        static::saving(function (self $model) {
            if ($model->isDirty('values')) {
                $values = array_filter(explode(',', $model->values)) ?? null;
                $model->values = $values;
            }
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function casts(): array
    {
        return [
            'values' => 'json',
            'filterable' => 'bool',
        ];
    }
}
