<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable=['name','faculty_id','icon','image','slug','description','status'];
    public function faculty():BelongsTo
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }
   
    public function levels():HasMany{
        return $this->hasMany(Level::class);
    }
    
      protected $casts = [
        'status' => 'boolean'
    ];
}
