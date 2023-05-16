<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','address','phone','email','company_id'];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function scopeLatestFirst ($query){
        return $query->orderBy('id', 'DESC');
    }
    public function scopeFilter($query){
        if($companyId = request('company_id')){
            $query->where('company_id',$companyId);
        }
        if($search = request('search')){
            $query->where('first_name','LIKE',"%{$search}%");
        }
        return $query;
    }
}
