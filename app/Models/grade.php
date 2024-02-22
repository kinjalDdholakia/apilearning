<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'marks',
        'student_id',
        'subject_id',
        'standard_id',
        'academicyear_id'
        
    ];


    public function student(){
        return $this->belongsTo(student::class);
    }
    public function  academicyear(){
        return $this->belongsTo(academicyear::class);

    }
    public function standard(){
        return $this->belongsTo(standard::class);
    }
    public function subject(){
        return $this->belongsTo(subject::class);
    }
}
