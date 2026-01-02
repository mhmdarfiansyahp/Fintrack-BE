<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Debts\DebtsController;
use App\Http\Controllers\Invesments\InvesmentController;
use App\Http\Controllers\Transactions\TransactionsController;
use App\Http\Controllers\Wishlist\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/transactions/weekly', [TransactionsController::class, 'weekly']);
Route::get('/transactions/expense-categories', [TransactionsController::class, 'expenseCategories']);
Route::get('/debts/top', [DebtsController::class, 'topDebts']);
Route::get('/wishlist/top', [WishlistController::class, 'topWishlist']);


Route::apiResource('categories', CategoryController::class);
Route::apiResource('transactions', TransactionsController::class);
Route::apiResource('debts', DebtsController::class);
Route::apiResource('wishlist', WishlistController::class);
Route::apiResource('invesments', InvesmentController::class);
