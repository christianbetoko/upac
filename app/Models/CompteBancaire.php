<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CompteBancaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'status'
    ];
        protected $casts = [
        'status' => 'boolean'
    ];
}
