<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTitle extends Model
{
    use HasFactory;
    public function events(){
        return $this->hasMany(Event::class, 'title_id');
    }

    public function getPhotosCountAttribute()
    {
        $events = $this->relationLoaded('events') ? $this->events : $this->events()->get();
        return $events->sum(function ($event) {
            return (int) ($event->image_count ?? 0);
        });
    }
}
