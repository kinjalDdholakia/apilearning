<?php

namespace App\Interfaces;
interface StudentRepositoryInterface 
{
    public function getTopStudentsClassWise();
    public function getTopStudentsSubjectWise();
    public function getTopStudentsLast5Years();

}