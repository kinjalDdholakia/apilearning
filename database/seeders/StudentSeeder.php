<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       student::create([
        'firstname'=>'kia',
        'lastname'=>'aj',
        'standard'=>1
       ]);
       student::create([
        'firstname'=>'aaz',
        'lastname'=>'aj',
        'standard'=>1
       ]);
       student::create([
        'firstname'=>'fnila',
        'lastname'=>'aj',
        'standard'=>1
       ]);
       student::create([
        'firstname'=>'rajvee',
        'lastname'=>'aj',
        'standard'=>1
       ]);
       student::create([
        'firstname'=>'rutvi',
        'lastname'=>'aj',
        'standard'=>2
       ]);
       student::create([
        'firstname'=>'ertiga',
        'lastname'=>'aj',
        'standard'=>2
       ]);
       student::create([
        'firstname'=>'regrgr',
        'lastname'=>'aj',
        'standard'=>2
       ]);
       student::create([
        'firstname'=>'fenisha',
        'lastname'=>'aj',
        'standard'=>2
       ]);
       student::create([
        'firstname'=>'ritika',
        'lastname'=>'aj',
        'standard'=>3
       ]);
       student::create([
        'firstname'=>'kiyana',
        'lastname'=>'aj',
        'standard'=>3
       ]);
       student::create([
        'firstname'=>'tisha',
        'lastname'=>'aj',
        'standard'=>3
       ]);
       student::create([
        'firstname'=>'kishu',
        'lastname'=>'aj',
        'standard'=>3
       ]);
       student::create([
        'firstname'=>'jinay',
        'lastname'=>'aj',
        'standard'=>4
       ]);
    }
}

