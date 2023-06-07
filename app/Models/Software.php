<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function software_requirements(){
        return $this->hasMany(SoftwareRequirement::class);
    }

    public function software_unders(){
        return $this->hasMany(SoftwareUnder::class);
    }
}
