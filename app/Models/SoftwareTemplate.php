<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareTemplate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function software(){
        return $this->belongsTo(Software::class);
    }
}
