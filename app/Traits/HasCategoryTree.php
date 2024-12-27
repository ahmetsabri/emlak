<?php

namespace App\Traits;

trait HasCategoryTree
{
    public function getCategoryTreeAttribute(): string
    {
        return $this->load('category')->category->bloodline->pluck('name')->join(' > ');
    }
}
