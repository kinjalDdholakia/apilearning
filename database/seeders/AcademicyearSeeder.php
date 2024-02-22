<?php

namespace Database\Seeders;

use App\Models\academicyear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicyearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        academicyear::create([
            'start_year'=>'2020',
            'end_year'=>'2021'
        ]);
        academicyear::create([
            'start_year'=>'2021',
            'end_year'=>'2022'
        ]);
        academicyear::create([
            'start_year'=>'2022',
            'end_year'=>'2023'
        ]);
        academicyear::create([
            'start_year'=>'2023',
            'end_year'=>'2024'
        ]);
        academicyear::create([
            'start_year'=>'2024',
            'end_year'=>'2025'
        ]);
        
    }
}
