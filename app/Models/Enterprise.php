<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Enterprise extends Model
{
     use HasFactory;
    protected $fillable = [
        'name',
        'about',
        'slogan',
        'description',
        'mission',
        'vision',
        'address',
        'phone',
        'email',
        'logo_with_bg',
        'logo_without_bg',
       'is_maintenance', // <-- Autoriser le remplissage
];

protected $casts = [
    'is_maintenance' => 'boolean', // <-- Cast automatique
];
}
