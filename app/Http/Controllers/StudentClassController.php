<?php

namespace App\Http\Controllers;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\grade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentClassController extends Controller
{
    public $studentRepositoryInterface;
    public function __construct(StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->studentRepositoryInterface = $studentRepositoryInterface;
    }

    public function GetTopStudents_ClassWise()
    {    
        return $this->studentRepositoryInterface->GetTopStudents_ClassWise();
    }

    public function GetTopStudents_SubjectWise()
    {
       return $this->studentRepositoryInterface->GetTopStudents_SubjectWise();
    }

    public function GetTopStudents_Last_5_Years()
    {
      return $this->studentRepositoryInterface->GetTopStudents_Last_5_Years();
    }
}
