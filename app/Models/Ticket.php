<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function assignedToUser(){
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function generateBy(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function attachments(){
        return $this->hasMany(TicketAttachment::class);
    }

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function reviewedBy(){
        return $this->belongsTo(User::class, 'reviewed_by', 'id');
    }
}
