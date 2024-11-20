<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseClassController;

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

Route::get('student-list',[StudentController::class, 'index']);
Route::post('student-register',[StudentController::class, 'register']);
Route::post('student-login',[StudentController::class, 'login']);
Route::get('class-list',[CourseClassController::class, 'index']);
Route::post('enroll-course',[CourseClassController::class, 'enroll']);
Route::get('enroll-list',[CourseClassController::class, 'enrollList']);
