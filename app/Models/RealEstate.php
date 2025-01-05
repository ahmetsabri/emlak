<?php

namespace App\Models;

use App\Traits\HasCategoryTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class RealEstate extends Model implements HasMedia
{
    use HasCategoryTree;
    use HasTranslations;
    use InteractsWithMedia;

    protected $appends = ['formatted_infos'];
    protected $translatable = ['title', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class)->using(FeatureRealEstate::class);
    }

    public function infos()
    {
        return $this->belongsToMany(Info::class)->using(InfoRealEstate::class)->withPivot('value');
    }

    public function getFormattedPriceAttribute(): bool|string
    {
        return Number::format($this->price, locale: 'tr');
    }

    public function getLatAttribute()
    {
        return explode(',', $this->location)[0];
    }

    public function getLngAttribute()
    {
        return explode(',', $this->location)[1];
    }

    public function getPriceInTryAttribute()
    {
        $exchangeRate = cache('exchange:rate');

        return Number::format($this->price, 2);
    }

    public function getPriceInUsdAttribute()
    {
        $exchangeRate = cache('exchange:rate');

        return Number::format($this->price / $exchangeRate['usd'], 2);
    }

    public function getPriceInEurAttribute()
    {
        $exchangeRate = cache('exchange:rate');

        return Number::format($this->price / $exchangeRate['eur'], 2);
    }

    public function getPriceInGbpAttribute()
    {
        $exchangeRate = cache('exchange:rate');

        return Number::format($this->price / $exchangeRate['gbp'], 2);
    }

    public function getFormattedInfosAttribute()
    {
        $formattedInfos = [];

        foreach ($this->infos as $info) {
            $key = 'info_' . $info['id'];
            $formattedInfos[$key] = $info->pivot->value;
        }

        return $formattedInfos;
    }
       public static function booted()
       {
           static::saving(function (self $model) {
               foreach ($model->attributes as $key => $value) {
                   if (str_contains($key, 'info_')) {
                       unset($model->attributes[$key]);
                   }
               }
           });
       }
}
