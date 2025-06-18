<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberData extends Model
{
    use HasFactory;
    protected $table = 'subscriberdata';

    protected $fillable=[
        'user_id',
        'plan',
        'amount',
        'transation_date',
        'transaction_number',
        'method',
        'currency',
        'json_response'
    ];
}
