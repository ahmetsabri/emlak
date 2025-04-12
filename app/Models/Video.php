<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{
    use HasTranslations;
    public $translatable = ['title'];

    public function scopeFilter(Builder $builder, $value)
    {
        $values = explode(',', $value ?? '');
        if (!$value) {
            return $builder;
        }
        return $builder->whereIn('video_category_id', $values);
    }

    public function category()
    {
        return $this->belongsTo(VideoCategory::class, 'video_category_id');
    }
}
