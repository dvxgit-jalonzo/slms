<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }


    public function remoteAccess(){
        return $this->hasMany(LicenseRemoteAccess::class);
    }

    public function attributes(){
        return $this->hasMany(LicenseAttribute::class);
    }

    public function software(){
        return $this->belongsTo(Software::class);
    }
}
