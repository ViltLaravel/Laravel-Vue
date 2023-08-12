<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController\StudentController;

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

Route::get('/', [StudentController::class, 'index'])->name('student-list');

Route::prefix('/student')->group(function(){
    Route::get('/add/student', [StudentController::class, 'create'])->name('student-create');
    Route::post('/add/student', [StudentController::class, 'store'])->name('student-store');
    Route::get('/edit/student/{id}', [StudentController::class, 'edit']);
    Route::post('/edit/student/{id}', [StudentController::class, 'update']);
    Route::delete('/delete/student/{id}', [StudentController::class, 'delete']);
    Route::get('/view/student/{id}', [StudentController::class, 'view']);
});



