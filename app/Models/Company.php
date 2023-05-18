<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','website','email','user_id'];

    public function contacts(){

        return $this->hasMany(Contact::class);

    }

    public function users(){

        return $this->belongsTo(User::class);

    }

    public static function userCompanies()
    {

        return self::where('user_id',auth()->id())->orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');

    }
}
