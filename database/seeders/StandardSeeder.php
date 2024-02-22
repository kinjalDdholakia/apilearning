<?php

namespace Database\Seeders;

use App\Models\standard as Standard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Standard::create([
        'name'=>'1'
      ]);
      Standard::create([
        'name'=>'2'
      ]);
      Standard::create([
        'name'=>'3'
      ]);

    }
}
