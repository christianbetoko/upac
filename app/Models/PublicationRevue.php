<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublicationRevue extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'file',
        'author',
        'publication_date',
        'status'
    ];
protected $casts = [
        'publication_date' => 'date',
        'status' => 'boolean',
    ];
}
