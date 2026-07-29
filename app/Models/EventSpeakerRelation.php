<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class EventSpeakerRelation extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'speaker_id',
        'role',
        'status',
    ];
protected $casts = [
        'status' => 'boolean',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function speaker()
    {
        return $this->belongsTo(EventSpeaker::class, 'speaker_id');
    }
}
