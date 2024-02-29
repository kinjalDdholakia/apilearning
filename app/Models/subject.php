<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        
    ];

    public function grades(){
        return $this->hasMany(grade::class);
    }
}
   