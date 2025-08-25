<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;

    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function Subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    public function Pathtype(){
        return $this->belongsTo(PathType::class,'pathtype_id');
    }
    public function Module(){
        return $this->belongsTo(Module::class,'module_id');
    }
}
