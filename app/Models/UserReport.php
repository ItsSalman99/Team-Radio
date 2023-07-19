<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
    use HasFactory;

    public function reported_from()
    {
        return $this->belongsTo(User::class, 'reported_from', 'id');
    }


    public function reported_to()
    {
        return $this->belongsTo(User::class, 'reported_to', 'id');
    }

    public function reason()
    {
        return $this->belongsTo(ReportReasons::class, 'reason_id', 'id');
    }

}
