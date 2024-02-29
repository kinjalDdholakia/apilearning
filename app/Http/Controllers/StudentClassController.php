<?php

namespace App\Http\Controllers;

use App\Interfaces\StudentRepositoryInterface;



class StudentClassController extends Controller
{
    public $studentRepositoryInterface;

    public function __construct(StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->studentRepositoryInterface = $studentRepositoryInterface;
    }

    public function getTopStudentsClassWise()
    {    
        return $this->studentRepositoryInterface->getTopStudentsClassWise();
    }

    public function getTopStudentsSubjectWise()
    {
       return $this->studentRepositoryInterface->getTopStudentsSubjectWise();
    }

    public function getTopStudentsLast5Years()
    {
      return $this->studentRepositoryInterface->getTopStudentsLast5Years();
    }
}
