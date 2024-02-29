<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
    ];

    public function grades(){
        return $this->hasMany(grade::class);
    }
}
