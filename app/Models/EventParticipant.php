<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class EventParticipant extends Model
{
      use HasFactory;
    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'status',
        'amount_paid',
    ];

    //
}
