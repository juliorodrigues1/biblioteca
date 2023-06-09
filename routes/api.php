<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

Route::post('/books', [\App\Http\Controllers\BookController::class, 'store']);
Route::get('/books/{id}', [\App\Http\Controllers\BookController::class, 'show']);
Route::get('/books', [\App\Http\Controllers\BookController::class, 'index']);
Route::put('/books/{id}', [\App\Http\Controllers\BookController::class, 'update']);
Route::delete('/books/{id}', [\App\Http\Controllers\BookController::class, 'destroy']);

Route::post('/loans', [\App\Http\Controllers\LoanController::class, 'store']);
Route::put('/loans/devolution', [\App\Http\Controllers\LoanController::class, 'devolution']);
Route::put('/loans/delayed', [\App\Http\Controllers\LoanController::class, 'devolution']);
