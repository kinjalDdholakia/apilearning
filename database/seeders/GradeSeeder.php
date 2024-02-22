<?php

namespace Database\Seeders;

use App\Models\grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        grade::create([
            'marks'=>'91',
            'student_id'=>22,
            'academicyear_id'=>4,
            'subject_id'=>1,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'45',
            'student_id'=>22,
            'academicyear_id'=>4,
            'subject_id'=>2,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'81',
            'student_id'=>22,
            'academicyear_id'=>4,
            'subject_id'=>3,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'54',
            'student_id'=>23,
            'academicyear_id'=>4,
            'subject_id'=>1,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'81',
            'student_id'=>23,
            'academicyear_id'=>4,
            'subject_id'=>2,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'78',
            'student_id'=>23,
            'academicyear_id'=>4,
            'subject_id'=>3,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'39',
            'student_id'=>24,
            'academicyear_id'=>4,
            'subject_id'=>1,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'94',
            'student_id'=>24,
            'academicyear_id'=>4,
            'subject_id'=>2,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'78.89',
            'student_id'=>24,
            'academicyear_id'=>4,
            'subject_id'=>3,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'89',
            'student_id'=>25,
            'academicyear_id'=>4,
            'subject_id'=>1,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'59',
            'student_id'=>25,
            'academicyear_id'=>4,
            'subject_id'=>2,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'93',
            'student_id'=>25,
            'academicyear_id'=>4,
            'subject_id'=>3,
            'standard_id'=>3
        ]);
        grade::create([
            'marks'=>'86',
            'student_id'=>26,
            'academicyear_id'=>4,
            'subject_id'=>1,
            'standard_id'=>4
        ]);
        grade::create([
            'marks'=>'57',
            'student_id'=>26,
            'academicyear_id'=>4,
            'subject_id'=>2,
            'standard_id'=>4
        ]);
        grade::create([
            'marks'=>'82',
            'student_id'=>26,
            'academicyear_id'=>4,
            'subject_id'=>3,
            'standard_id'=>4
        ]);
    }
}
