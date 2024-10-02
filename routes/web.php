<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use  App\Http\Controllers\NewstudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/students/upload', [StudentController::class, 'showUploadForm']);
Route::post('/students/upload', [StudentController::class, 'uploadCsv']);

Route::get('/new-student', [NewstudentController::class, 'index'])->name('new.index');
Route::post('/new-student/store', [NewstudentController::class, 'store'])->name('new.store');

Route::get('/', function () {
    return view('welcome');
});
