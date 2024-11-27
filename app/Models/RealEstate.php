<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class RealEstate extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;

    protected $translatable = ['title', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryTreeAttribute(): string
    {
        return $this->load('category')->category->bloodline->pluck('name')->join(' > ');
    }

    public function getFormattedPriceAttribute(): bool|string
    {
        return Number::format($this->price, locale:'tr');
    }
}
