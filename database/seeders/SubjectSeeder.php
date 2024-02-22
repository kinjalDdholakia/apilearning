<?php

namespace Database\Seeders;

use App\Models\subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            subject::create([
                'subject_name'=>'maths'
            ]);
            subject::create([
                'subject_name'=>'english'
            ]);
            subject::create([
                'subject_name'=>'gujarati'
            ]);
    }
}
