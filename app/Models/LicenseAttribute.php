<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseAttribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function license(){
        return $this->belongsTo(License::class);
    }
}
