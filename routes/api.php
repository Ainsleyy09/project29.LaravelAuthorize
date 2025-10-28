<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:api'])->group(function () {
    //TRANSACTIONS
    Route::apiResource('/transactions', TransactionController::class)->only(['store', 'show']);
    Route::post('/transactions/{id}', [TransactionController::class, 'update']);
    Route::get('/mytransactions', [TransactionController::class, 'myTransactions']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware(['role:admin'])->group(function () {
        //BOOKS
        Route::apiResource('/books', BookController::class)->only(['store', 'destroy']);
        Route::post('/books/{id}', [BookController::class, 'update']);

        //GENRE
        Route::apiResource('/genres', GenreController::class)->only(['store', 'destroy']);
        Route::post('/genres/{id}', [GenreController::class, 'update']);

        //AUTHOR
        Route::apiResource('/authors', AuthorController::class)->only(['store', 'destroy']);
        Route::post('/authors/{id}', [AuthorController::class, 'update']);

        //TRANSACTION
        Route::apiResource('/transactions', TransactionController::class)->only(['index', 'destroy']);

        //USERS
        Route::apiResource('/users', UserController::class);
    });
});

//BOOKS
Route::apiResource('/books', BookController::class)->only(['index', 'show']);

// GENRE
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);

//Author
Route::apiResource('/authors', AuthorController::class)->only(['index', 'show']);

//LOGIN & LOGOUT
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
