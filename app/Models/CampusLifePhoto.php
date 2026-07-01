<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CampusLifePhoto extends Model
{
      use HasFactory;
    protected $fillable = [
    'user_id',
    'title',
    'image_path',
    'status'
];
protected $casts = ['status' => 'boolean'];
    public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}
}
