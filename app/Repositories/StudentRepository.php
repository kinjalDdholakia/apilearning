<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\grade as Grade;
use Carbon\Carbon;


class StudentRepository implements StudentRepositoryInterface
{

    public function  getTopStudentsClassWise()
    {
        $selectedAcademicYear = Carbon::now()->year;
        $topStudents = Grade::whereHas('academicyear', function ($query) use ($selectedAcademicYear) {
            $query->where('start_year', '=', $selectedAcademicYear);
        })
            ->get()
            ->groupBy('standard_id')

            ->map(function ($grades) {

                return [
                    $grades->groupBy('student_id')
                        ->map(function ($studentGrades) {
                            return [
                                'student_id' => $studentGrades->first()->student->id,
                                'student_name' => $studentGrades->first()->student->firstname,
                                'total_marks' => $studentGrades->sum('marks'),
                            ];
                        })->sortByDesc('total_marks')->take(3)
                ];
            });

        return $topStudents;
    }
    public function getTopStudentsSubjectWise()
    {
        $selectedAcademicYear = Carbon::now()->year;
        $topStudentsBySubject = Grade::whereHas('academicyear', function ($query) use ($selectedAcademicYear) {
            $query->where('start_year', '=', $selectedAcademicYear);
        })
            ->get()
            ->groupBy('subject')
            ->map(function ($grades) {

                return [
                    $grades->groupBy('standard_id')

                        ->map(function ($standardGrades) {
                            return [
                                $standardGrades->sortByDesc('marks')
                                    ->take(3)
                                    ->map(function ($studentGrades) {
                                        return [
                                            'student_id' => $studentGrades->student->id,
                                            'student_name' => $studentGrades->student->firstname,
                                            'subject_name'=>$studentGrades->subject->subject_name,
                                            'marks' => $studentGrades->marks,
                                        ];
                                    })
                            ];
                        })

                ];
            });

        return $topStudentsBySubject;
    }
    public function getTopStudentsLast5Years()
    {
        $last5Years = Carbon::now()->subYears(5)->year;
        $topStudentsOfLastYear = Grade::whereHas('academicyear', function ($query) use ($last5Years) {
            $query->where('start_year', '>=', $last5Years);
        })
            ->get()
            ->sortByDesc('academicyear_id')
            ->groupBy('academicyear_id')

            ->map(function ($grades) {

                return [
                    $grades->groupBy('standard_id')

                        ->map(function ($studentId) {
                            return [
                                $studentId->groupBy('student_id')
                                    ->map(function ($studentGrades) {
                                        return [
                                            'student_id' => $studentGrades->first()->student->id,
                                            'student_name' => $studentGrades->first()->student->firstname,
                                            'total_marks' => $studentGrades->sum('marks'),
                                        ];
                                    })->sortByDesc('total_marks')->take(3)
                            ];
                        })

                ];
            });

        return $topStudentsOfLastYear;
    }
}
