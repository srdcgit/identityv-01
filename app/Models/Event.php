<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function getImageCountAttribute()
    {
        $rawImage = $this->getRawOriginal('image');
        if (is_string($rawImage)) {
            $decoded = json_decode($rawImage, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return count($decoded);
            }
            return trim($rawImage) !== '' ? 1 : 0;
        }
        if (is_array($rawImage)) {
            return count($rawImage);
        }
        return 0;
    }

    public function getEvent(){
        return $this->belongsTo(EventTitle::class, 'title_id');
    }
}
