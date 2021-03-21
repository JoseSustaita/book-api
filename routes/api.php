<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Authors
Route::get('/authors', [AuthorController::class, 'index']);
Route::prefix('/authors')->group(function () {
    Route::get('/{author}', [AuthorController::class, 'show']);
    Route::post('/store', [AuthorController::class, 'store']);
    Route::put('/{author}', [AuthorController::class, 'update']);
    Route::delete('/{author}', [AuthorController::class, 'destroy']);

});

//Books
Route::get('/books', [BookController::class, 'index']);
Route::prefix('/books')->group(function () {
    Route::get('/{book}', [BookController::class, 'show']);
    Route::post('/store', [BookController::class, 'store']);
    Route::put('/{book}', [BookController::class, 'update']);
    Route::delete('/{book}', [BookController::class, 'destroy']);
});
