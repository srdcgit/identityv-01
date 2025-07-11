<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category2 extends Model
{
    use HasFactory;

    public function getCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
