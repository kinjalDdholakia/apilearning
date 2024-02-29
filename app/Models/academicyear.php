<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academicyear extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_year',
        'end_year'
        
    ];

    public function grades(){
        return $this->hasMany(grade::class);
    }
}
