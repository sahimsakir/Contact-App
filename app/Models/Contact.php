<?php

namespace App\Models;

use App\Scopes\FilterScope;
use App\Scopes\ContactSearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','address','phone','email','company_id','user_id'];
    public $filterColumns = ['company_id'];

    public function company(){
        return $this->belongsTo(Company::class)->withoutGlobalScopes();
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst ($query){
        return $query->orderBy('id', 'DESC');
    }

    public static function booted(){
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new ContactSearchScope);
    }
}
