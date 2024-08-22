<?php

use App\Http\Controllers\AuditLogController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\BatchController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');
Route::resource('students', StudentController::class);
Route::resource('batches', BatchController::class);
Route::post('batches/{batch}/assign-student', [BatchController::class, 'assignStudent'])->name('batches.assign-student');

Route::get('audit-logs', [AuditLogController::class, 'index'])->name('audit.logs');
