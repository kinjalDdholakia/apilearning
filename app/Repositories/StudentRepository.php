<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\grade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{

    public function  getTopStudentsClassWise()
    {
        $selectedAcademicYear = Carbon::now()->year;

        $topStudentsByGrade = grade::select(
            'standards.name as standard',
            'students.id',
            'students.firstname',
            'students.lastname',
            DB::raw('SUM(grades.marks) as total_marks')

        )
            ->join('students', 'grades.student_id', '=', 'students.id')
            ->join('subjects', 'grades.subject_id', '=', 'subjects.id')
            ->join('standards', 'grades.standard_id', '=', 'standards.id')
            ->join('academicyears', 'grades.academicyear_id', '=', 'academicyears.id')
            ->where('academicyears.start_year', '=', $selectedAcademicYear)
            ->groupBy('standards.name', 'students.id', 'students.firstname', 'students.lastname')
            ->orderBy('standards.name')
            ->orderByDesc('total_marks')
            ->get();
        $filteredResults = collect();

        foreach ($topStudentsByGrade as $student) {
            $grade = $student['standard'];

            // Check if we already have 3 students for this grade
            if (!$filteredResults->has($grade)) {
                $filteredResults[$grade] = collect();
            }

            // Add the student to the filtered results if less than 3 students are already added
            if ($filteredResults[$grade]->count() < 3) {
                $filteredResults[$grade]->push([
                    'id' => $student['id'],
                    'firstname' => $student['firstname'],
                    'lastname' => $student['lastname'],
                    'marks' => $student['total_marks'],
                ]);
            }
        }

        return $filteredResults;
    }
    public function getTopStudentsSubjectWise()
    {
        $selectedAcademicYear = Carbon::now()->year;

        $topStudentsBySubject = grade::select(
            'subjects.subject_name as subject_name',
            'standards.name as standard',
            'students.id',
            'students.firstname',
            'students.lastname',
            'grades.marks'


        )
            ->join('students','grades.student_id', '=','students.id')
            ->join('subjects','grades.subject_id', '=','subjects.id')
            ->join('standards','grades.standard_id', '=','standards.id')
            ->join('academicyears','grades.academicyear_id', '=','academicyears.id')
            ->where('academicyears.start_year', '=', $selectedAcademicYear)
            ->groupBy('subjects.subject_name','standards.name','students.id','students.firstname',
                      'students.lastname','grades.marks')
            ->orderBy('subjects.subject_name')
            ->orderBy('standards.name')
            ->orderByDesc('grades.marks')
            ->get();


          
            $organizedData = collect();


        foreach ($topStudentsBySubject as $student) {
            $subjectName = $student['subject_name'];
            $standard = $student['standard'];

            // Check if we already have data for this subject
            if (!$organizedData->has($subjectName)) {
                $organizedData[$subjectName] = collect();
            }

            // Check if we already have top 3 students for this subject and class
            if (!$organizedData[$subjectName]->has($standard)) {
                $organizedData[$subjectName][$standard] = collect();
            }

            // Add the student to the top 3 for this subject and class
            if ($organizedData[$subjectName][$standard]->count() < 3) {
                $organizedData[$subjectName][$standard]->push([
                    'id' => $student['id'],
                    'firstname' => $student['firstname'],
                    'lastname' => $student['lastname'],
                    'marks' => $student['marks'],
                ]);
            }
        }


        return $organizedData;
    }
    public function getTopStudentsLast5Years()
    {
        $last5Years = Carbon::now()->subYears(5)->year;
        $topStudentsBygrade = grade::select(

            'academicyears.start_year as year',
            'standards.name as standard',
            'students.id',
            'students.firstname',
            'students.lastname',

            DB::raw('SUM(grades.marks) as total_marks')

        )
            ->join('students', 'grades.student_id', '=', 'students.id')
            ->join('academicyears', 'grades.academicyear_id', '=', 'academicyears.id')
            ->join('standards', 'grades.standard_id', '=', 'standards.id')
            ->where('academicyears.start_year', '>=', $last5Years)
            ->groupBy('standards.name', 'students.id', 'students.firstname', 'students.lastname', 'academicyears.start_year')
            ->orderByDesc('academicyears.start_year')
            ->orderBy('standards.name')
            ->orderByDesc('total_marks')
            ->get();
        //return $topStudentsBySubject;

        $organizedData = collect();


        foreach ($topStudentsBygrade as $student) {
            $Academicyear = $student['year'];
            $standard = $student['standard'];

            // Check if we already have data for this year
            if (!$organizedData->has($Academicyear)) {
                $organizedData[$Academicyear] = collect();
            }

            // Check if we already have top 3 students for this year and class
            if (!$organizedData[$Academicyear]->has($standard)) {
                $organizedData[$Academicyear][$standard] = collect();
            }

            // Add the student to the top 3 for this year and class
            if ($organizedData[$Academicyear][$standard]->count() < 3) {
                $organizedData[$Academicyear][$standard]->push([
                    'id' => $student['id'],
                    'firstname' => $student['firstname'],
                    'lastname' => $student['lastname'],
                    'marks' => $student['total_marks'],
                ]);
            }
        }


        return $organizedData;
    }
}
