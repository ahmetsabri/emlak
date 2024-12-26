<?php

namespace App\Models;

use App\Traits\HasCategoryTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasCategoryTree;

    /** @use HasFactory<\Database\Factories\FeatureFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_feature');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function getFormattedNameAttribute()
    {
        $group = $this->load('group')->group->name;

        return $this->name." ($group) ";
    }
}
