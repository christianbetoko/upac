<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'image_cover',
        'status',
        'views_count',
        'event_date',
        'event_start_time',
        'event_end_time',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
