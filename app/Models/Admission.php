<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admission extends Model
{
    use HasFactory;
    protected $fillable=[
        
        'code',
        'photo',
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'gender',
        'birth_date',
        'school_name',
        'school_option',
        'school_grad_year',
        'school_percentage',
        'school_file',
        'university_name',
        'university_option',
        'university_grad_year',
        'university_mention',
        'university_percentage',
        'university_file',
        'department_id',
        'level_id',
        'national_id',
        'birth_certificate',
        'good_conduct_certificate',

        'status'
    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
 public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }


    
}
