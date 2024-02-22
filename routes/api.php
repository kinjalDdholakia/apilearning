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
Route::get('/students',[StudentClassController::class,'gettop3studentsclasswise']);
Route::get('/students/subject_wise',[StudentClassController::class,'gettop3studentssubjectwise']);
Route::get('/students/last5years',[StudentClassController::class,'gettop3studentsoflast5years']);