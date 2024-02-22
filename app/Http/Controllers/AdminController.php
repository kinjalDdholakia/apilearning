<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Models\grade;
use App\Models\student;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()

    {
        $last5Years = Carbon::now()->subYears(5)->year;

        $topStudentsBySubject = grade::select(

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
        foreach ($topStudentsBySubject as $student) {
            $Academicyear = $student['year'];
            $standard = $student['standard'];

            // Check if we already have data for this subject
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

    public function auth(AdminLoginRequest $request)
    {
        $result = Admin::where(['email' => $request->email, 'password' => $request->password])->get();
        if (isset($result['0']->id)) {
        } else {
            return redirect()->route('Login')->with('alert-error', 'Login Failed');
        }
    }
}
