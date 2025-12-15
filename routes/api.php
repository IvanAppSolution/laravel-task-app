<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TaskController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/tasks', TaskController::class); 

// Route::group(['prefix' => '/categories', 'as' => 'categories.'], function () {
//     Route::get('/', [CategoryController::class, 'index']);
//     Route::get('/{id}', [CategoryController::class, 'get'])->where('id', '[1-9][0-9]*');
//     Route::post('/', [CategoryController::class, 'store']);
//     Route::put('/{id}', [CategoryController::class, 'update'])->where('id', '[1-9][0-9]*');
//     Route::delete('/{id}', [CategoryController::class, 'delete'])->where('id', '[1-9][0-9]*');
//     Route::put('/', [CategoryController::class, 'reorder']);
// });