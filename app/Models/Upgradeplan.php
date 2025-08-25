<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upgradeplan extends Model
{
    use HasFactory;
    protected $table = 'upgrades';

    public function getmodel()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
