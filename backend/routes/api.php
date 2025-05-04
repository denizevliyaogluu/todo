<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TodoController;
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

Route::middleware('throttle:10,1')->group(function () {
    Route::prefix('todos')->group(function() {
        Route::get('/', [TodoController::class, 'index']);
        Route::get('{id}', [TodoController::class, 'show']);
        Route::post('/', [TodoController::class, 'store']);
        Route::put('{id}', [TodoController::class, 'update']);
        Route::patch('{id}/status', [TodoController::class, 'updateStatus']);
        Route::delete('{id}', [TodoController::class, 'destroy']);
        Route::get('search', [TodoController::class, 'search']);
    });

    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('{id}', [CategoryController::class, 'show']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('{id}', [CategoryController::class, 'update']);
        Route::delete('{id}', [CategoryController::class, 'destroy']);
        Route::get('{id}/todos', [CategoryController::class, 'todos']);
    });

    Route::prefix('stats')->group(function() {
        Route::get('todos', [StatsController::class, 'getTodosStats']);
        Route::get('priorities', [StatsController::class, 'getPrioritiesStats']);
    });
});
