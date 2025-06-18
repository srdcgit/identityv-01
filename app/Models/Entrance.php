<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrance extends Model
{
    use HasFactory;

    public function Module(){
        return $this->belongsTo(Module::class,'module_id');
    }
    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function Subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
}
