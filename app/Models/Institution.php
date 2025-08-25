<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function State()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function Dist()
    {
        return $this->belongsTo(District::class, 'dist_id');
    }
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'institution_subcategory');
    }
}
