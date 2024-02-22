<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentClassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/GetTopStudents_ClassWise',[StudentClassController::class,'getTopStudentsClassWise']);
Route::get('/GetTopStudents_SubjectWise',[StudentClassController::class,'getTopStudentsSubjectWise']);
Route::get('/GetTopStudents_Last_5_Years',[StudentClassController::class,'getTopStudentsLast5Years']);