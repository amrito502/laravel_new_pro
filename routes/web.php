<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use  App\Http\Controllers\NewstudentController;
use App\Http\Controllers\CSVUploadController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::group([], function(){







Route::resource('/permissions', PermissionController::class);
Route::get('/permissions/{permissionId}/delete', [PermissionController::class,'destory']);



Route::resource('/users', UserController::class);
Route::get('/users/{userId}/delete', [UserController::class,'destory']);

Route::resource('/roles', RoleController::class);
Route::get('/roles/{roleId}/delete', [RoleController::class,'destory']);

Route::get('/roles/{roleId}/give-permission', [RoleController::class,'addPermissionToRole']);
Route::put('/roles/{roleId}/give-permission', [RoleController::class,'updatePermissionToRole']);



});















Route::get('upload', [CSVUploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('upload', [CSVUploadController::class, 'uploadCSV'])->name('upload.csv');


Route::get('/students/upload', [StudentController::class, 'showUploadForm']);
Route::post('/students/upload', [StudentController::class, 'uploadCsv']);

Route::get('/new-student', [NewstudentController::class, 'index'])->name('new.index');
Route::post('/new-student/store', [NewstudentController::class, 'store'])->name('new.store');

Route::get('/', function () {
    return view('welcome');
});
