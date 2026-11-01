<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//   return $request->user();
// })->middleware('auth:sanctum');

use App\Http\Controllers\ {
    AuthController,
    MemberController,
    BookController,
    AuthorController,
    PublisherController,
    LoanController,
};

// 1. Endpoint login publik (bisa diakses tanpa token)
Route::post('/login', [AuthController::class, 'login']);

// 2. Endpoint yang dilindungi middleware 'auth:sanctum' (Wajib membawa Token Bearer)
Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', [AuthController::class, 'logout']);
Route::apiResource('members', MemberController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('publishers', PublisherController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('loans', LoanController::class);
});