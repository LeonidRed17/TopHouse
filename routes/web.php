<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/user', [MainController::class, 'index']);

Route::get('/', function () {
});


