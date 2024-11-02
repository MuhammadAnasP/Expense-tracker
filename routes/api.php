<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/expenses/create', [ExpenseController::class, 'create_expense']);
    Route::get('/expenses', [ExpenseController::class, 'get_expenses']);
    Route::get('/expenses/{id}', [ExpenseController::class, 'get_expense']);
    Route::put('/expenses/{id}', [ExpenseController::class, 'update_expense']);
    Route::delete('/expenses/{id}', [ExpenseController::class, 'delete_expense']);

    Route::post('/categories/create', [CategoryController::class, 'create_category']);
    Route::get('/categories', [CategoryController::class, 'get_categories']);
    Route::get('/categories/{id}', [CategoryController::class, 'get_category']);
    Route::put('/categories/{id}', [CategoryController::class, 'update_category']);
    Route::delete('/categories/{id}', [CategoryController::class, 'delete_category']);
});
