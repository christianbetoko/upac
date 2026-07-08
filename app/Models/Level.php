<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Level extends Model
{
     use HasFactory;
    protected $fillable=['name','code','department_id','icon','image','slug','description','status'];
      protected $casts = [
        'status' => 'boolean'
    ];
    public function department():BelongsTo{
        return $this->belongsTo(Department::class,'department_id');
    }
}
