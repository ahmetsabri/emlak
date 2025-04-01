<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CompanyScope implements Scope
{
    private $companyId;

    public function __construct()
    {
        $this->companyId = auth()->user()->company_id;
    }

    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('company_id', $this->companyId);
    }
}
