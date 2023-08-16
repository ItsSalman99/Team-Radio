<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedBack extends Model
{
    use HasFactory;
    
    public function feedback_to()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
    
    public function feedback_from()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }
    
}
