<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use  App\Http\Controllers\NewstudentController;
use App\Http\Controllers\CSVUploadController;
use App\Http\Controllers\LeaverequestController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){







Route::resource('/permissions', PermissionController::class);
Route::get('/permissions/{permissionId}/delete', [PermissionController::class,'destory']);



Route::resource('/users', UserController::class);
Route::get('/users/{userId}/delete', [UserController::class,'destory']);

Route::resource('/roles', RoleController::class);
Route::get('/roles/{roleId}/delete', [RoleController::class,'destory']);

Route::get('/roles/{roleId}/give-permission', [RoleController::class,'addPermissionToRole']);
Route::put('/roles/{roleId}/give-permission', [RoleController::class,'updatePermissionToRole']);



});


Route::middleware('auth')->group(function () {
    Route::get('/leave', [LeaverequestController::class, 'index'])->name('leave.index');
    Route::post('/apply-leave', [LeaverequestController::class, 'apply'])->name('leave.apply');
    Route::post('/leave/{leaveRequest}/approve', [LeaverequestController::class, 'approve'])->name('leave.approve');
    Route::post('/leave/{leaveRequest}/reject', [LeaverequestController::class, 'reject'])->name('leave.reject');
});