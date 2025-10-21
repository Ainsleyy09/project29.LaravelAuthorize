<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:api'])->group(function () {
    //TRANSACTIONS
    Route::apiResource('/transactions', TransactionController::class)->only(['store', 'show']);
    Route::post('/transactions/{id}', [TransactionController::class, 'update']);

    Route::middleware(['role:admin'])->group(function () {
        //BOOKS
        Route::apiResource('/books', BookController::class)->only(['store', 'destroy']);
        Route::post('/books/{id}', [BookController::class, 'update']);

        //GENRE
        Route::apiResource('/genre', GenreController::class)->only(['store', 'destroy']);
        Route::post('/genre/{id}', [GenreController::class, 'update']);

        //AUTHOR
        Route::apiResource('/author', AuthorController::class)->only(['store', 'destroy']);
        Route::post('/author/{id}', [AuthorController::class, 'update']);

        //TRANSACTION
        Route::apiResource('/transactions', TransactionController::class)->only(['index', 'destroy']);
    });
});

//BOOKS
Route::apiResource('/books', BookController::class)->only(['index', 'show']);

// GENRE
Route::apiResource('/genre', GenreController::class)->only(['index', 'show']);

//Author
Route::apiResource('/author', AuthorController::class)->only(['index', 'show']);

//LOGIN & LOGOUT
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
