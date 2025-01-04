<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    use HasRecursiveRelationships;
    use HasTranslations;

    public $translatable = ['name'];

    public function getPathSeparator()
    {
        return '.children.';
    }

    public function realEstates()
    {
        return $this->hasMany(RealEstate::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function infos()
    {
        return $this->belongsToMany(Info::class);
    }
}
