<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});


//Route::apiResource('news', NewsController::class);

Route::get('/news', [NewsController::class, 'index']); // Получить список всех новостей
Route::post('/news', [NewsController::class, 'store']); // Создать новость

/*
Route::get('/news/{id}', [NewsController::class, 'show']); // Получить конкретную новость
Route::put('/news/{id}', [NewsController::class, 'update']); // Обновить новость
Route::delete('/news/{id}', [NewsController::class, 'destroy']); // Удалить новость
*/