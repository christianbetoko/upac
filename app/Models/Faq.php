<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'category_id',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
    public function category()
    {
        return $this->belongsTo(CategoryFaq::class, 'category_id');
    }
}
