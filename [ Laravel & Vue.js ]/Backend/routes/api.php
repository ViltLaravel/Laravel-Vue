<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController\UserController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list', [StudentController::class, 'index']);
Route::prefix('/list')->group(function(){
    Route::get('/{id}', [StudentController::class, 'editStudent']);
    Route::get('/{id}/edit', [StudentController::class, 'editforStudent']);
    Route::post('/store', [StudentController::class, 'addStudent']);
    Route::put('/{id}/edit', [StudentController::class, 'updateStudent']);
    Route::delete('/{id}/delete', [StudentController::class, 'deleteStudent']);
});
