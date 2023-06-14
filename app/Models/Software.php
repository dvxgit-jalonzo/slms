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

    public function software_templates(){
        return $this->hasMany(SoftwareTemplate::class);
    }

    public function software_devices(){
        return $this->hasMany(SoftwareDevice::class);
    }

    public function licenses(){
        return $this->hasMany(License::class);
    }
}
