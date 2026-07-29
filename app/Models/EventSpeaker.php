<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class EventSpeaker extends Model
{
      use HasFactory;
      protected $fillable = [
        'name',
        'bio',
        'photo',
        'email',
        'phone',
        'linkedin',
        'twitter',
        'facebook',
        'instagram',
        'tiktok',
        'youtube',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

}
