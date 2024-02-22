<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentClassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
Route::get('dashboard', [AdminController::class, 'dashboard']); 
Route::get('logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/students',[StudentClassController::class,'gettop3studentsclasswise']);
Route::get('/students/subjectwise',[StudentClassController::class,'gettop3studentssubjectwise']);
