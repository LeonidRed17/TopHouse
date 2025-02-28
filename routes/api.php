<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\CategoryController;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);
Route::post('/news', [NewsController::class, 'store']); 


Route::post('/news/reactions', [ReactionController::class, 'storeNewsReaction']);
Route::delete('/news/reactions', [ReactionController::class, 'deleteNewsReaction']);

Route::post('/comments/reactions', [ReactionController::class, 'storeCommentReaction']);
Route::delete('/comments/reactions', [ReactionController::class, 'deleteCommentReaction']);
/*
Route::get('/news/{id}', [NewsController::class, 'show']); 
Route::put('/news/{id}', [NewsController::class, 'update']); 
Route::delete('/news/{id}', [NewsController::class, 'destroy']);
*/