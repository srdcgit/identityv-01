<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryRange extends Model
{
    use HasFactory;

    protected $fillable = ['stream_id','category_id', 'category2_id', 'subcategory_id', 'salary'];
    public function getStream(){
        return $this->belongsTo(Stream::class, 'stream_id');
    }
    public function getCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function get2Category(){
        return $this->belongsTo(Category2::class, 'category2_id');
    }
    public function getSubcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
