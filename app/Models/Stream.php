<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;
     public function countCategory(){
        return $this->hasMany(Category::class, 'stream_id');
     }
}
