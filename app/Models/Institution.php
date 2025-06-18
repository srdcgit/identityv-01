<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    public function Modules(){
        return $this->belongsTo(Module::class,'module_id');
    }
    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function Subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    public function Country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function State(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function Dist(){
        return $this->belongsTo(District::class,'dist_id');
    }
}
