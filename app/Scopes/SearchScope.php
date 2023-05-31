<?php

namespace App\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SearchScope implements Scope{

    protected $searchColumns = [];

    public function apply (Builder $builder, Model $model): void {
        $columns = property_exists($model, 'searchColumns') ? $model->searchColumns : $this->searchColumns;

        if($search = request()->query('search')){

            foreach ($columns as $index => $column){

                $arr = explode('.', $column);
                $method = $index === 0 ? 'where' : 'orWhere';

                if(count($arr)==2){

                    $method .= 'Has';

                    list($relationship , $col) = $arr;
                    $builder->$method($relationship, function ($query) use ($search, $col) {
                        $query->where($col, 'LIKE',"%{$search}%");
                    });

                }
                else{

                    $builder->$method($column,'LIKE',"%{$search}%");

                }
            }
        }
    }
}
