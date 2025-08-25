<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getMenu()
    {
        return $this->belongsTo(Page::class, 'menu_id');
    }
}
