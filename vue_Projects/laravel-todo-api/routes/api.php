<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListToDoController;

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

Route::get('items', [ListToDoController::class, 'index']);
Route::prefix('/item')->group( function () {
    Route::get('/{id}', [ListToDoController::class, 'editList']);
    Route::post('/store', [ListToDoController::class, 'addList']);
    Route::post('/update', [ListToDoController::class, 'updateList']);
    Route::delete('/{id}', [ListToDoController::class, 'deleteList']);
});
