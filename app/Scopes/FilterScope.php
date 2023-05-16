<?php

namespace App\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope{

    protected $filterColumns = [];
    public function apply (Builder $builder, Model $model): void {
        $columns = property_exists($model, 'filterColumns') ? $model->filterColumns : $this->filterColmns;
        foreach ($columns as $column){
            if($value = request($column)){
                $builder->where($column,$value);
            }
        }

    }
}
