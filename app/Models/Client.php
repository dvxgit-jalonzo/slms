<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clientContacts(){
        return $this->hasMany(ClientContact::class);
    }



//    Mutators
    public function getCodeAttribute($value){
        return strtoupper($value);
    }


    public function setCodeAttribute($value){
         $this->attributes['code'] = strtoupper($value);
    }


}
