<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController\UserController;
use Illuminate\Support\Facades\Redis;

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

//Route::get('/student','StudentController/ListController', 'index');

// Route::get('/student', 'UserController@index');

Route::get('/liststudent', [UserController::class, 'index'])->name('liststudent');

// Route::post('/student', [UserController::class, 'create'])->name('insertStudent');
