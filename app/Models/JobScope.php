<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobScope extends Model
{
    use HasFactory;

    public function getStream(){
        return $this->belongsTo(Stream::class,'stream_id');
    }
    public function getCategory(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function get2Category(){
        return $this->belongsTo(Category2::class,'category2_id');
    }
    public function getSubcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
}
