<?php

namespace App\Interfaces;
interface StudentRepositoryInterface 
{
    public function GetTopStudents_ClassWise();
    public function GetTopStudents_SubjectWise();
    public function GetTopStudents_Last_5_Years();

}