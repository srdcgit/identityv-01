<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'usercategory_id',
        'institution_id',
        'title',
        'file',
        'description',
        'is_upgrade'
    ];

    public function getCategory()
    {
        return $this->belongsTo(Category2::class, 'category_id');
    }
    public function userCategory()
    {
        return $this->belongsTo(Category::class, 'maincategory_id');
    }
    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'institution_subcategory')->withTimestamps();;
    }
}
