<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CategoryFaq extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id');
    }
}
