<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }
}
