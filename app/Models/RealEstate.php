<?php

namespace App\Models;

use App\Traits\HasCategoryTree;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
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
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class)->using(FeatureRealEstate::class);
    }

    public function infos()
    {
        return $this->belongsToMany(Info::class)->using(InfoRealEstate::class)->withPivot('value');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
            $key = 'info_'.$info['id'];
            $formattedInfos[$key] = $info->pivot->value;
        }

        return $formattedInfos;
    }

    public static function booted()
    {
        static::saving(function (self $model) {
            $model->company_id = auth()->user()->company_id;
            $model->slug = str()->slug($model->title);
            foreach ($model->attributes as $key => $value) {
                if (str_contains($key, 'info_')) {
                    unset($model->attributes[$key]);
                }
            }
        });
    }

    public function getMainCategoryAttribute()
    {
        $category = $this->load('category.rootAncestor')->category;

        return $category->rootAncestor?->name ?? $category->name;
    }

    public function scopeProvince(Builder $builder, $val)
    {
        return is_numeric($val) ? $builder->where('province_id', $val) : $builder;
    }

    public function scopeTown(Builder $builder, $val)
    {
        return is_numeric($val) ? $builder->where('town_id', $val) : $builder;
    }

    public function scopeCategory(Builder $builder, $val)
    {
        $values = Category::find($val)?->bloodline?->pluck('id') ?? [$val];

        return $builder->whereIn('category_id', $values);
    }

    public function scopeMinPrice(Builder $builder, $val = 0)
    {
        if (!str_replace('.', '', $val)) {
            return $builder;
        }

        $allowedPrices = ['tl', 'eur', 'usd'];
        $col = in_array(request('filter.currency'), $allowedPrices) ? request('filter.currency') : 'tl';
        return $builder->where("price", '>=', $val);
    }

    public function scopeMaxPrice(Builder $builder, $val = 0)
    {
        if (!str_replace('.', '', $val)) {
            return $builder;
        }
        $allowedPrices = ['tl', 'eur', 'usd'];
        $col = in_array(request('filter.currency'), $allowedPrices) ? request('filter.currency') : 'tl';


        return $builder->where("price", '<=', $val);
    }

    public function scopeInfo(Builder $builder, ...$val)
    {
        return $builder->whereHas('options', function ($query) use ($val) {
            foreach ($val as $index => $value) {
                if ($index == 0) {
                    $query->whereIn('value_id', Arr::except($value, 'id'))->where('info_id', $value['id'] ?? null);
                }
                $query->orWhereIn('value_id', Arr::except($value, 'id'))->where('info_id', $value['id'] ?? null);
            }
        });
    }

    public function scopeUserId(Builder $builder, $val)
    {
        return $builder->where('user_id', $val);
    }

    public function getLatLonAttribute()
    {
        $location = $this->location;
        if (! $location) {
            return;
        }

        return explode(',', $location);
    }

    public function getRoomsCountAttribute()
    {
        $roomsCount = $this->load(['infos' => fn ($q) => $q->where('info_id', 2)])->infos?->first()?->value;

        return $roomsCount;
    }


}
