<?php

namespace App\Models;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
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

    public static function booted(){
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new SearchScope);
    }
}
