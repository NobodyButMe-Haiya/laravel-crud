<?php

use App\Http\Controllers\Api\PersonController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::post('/person/add', [PersonController::class, 'add']);
    Route::get('/person/read', [PersonController::class, 'read']);
    Route::get('/person/search', [PersonController::class, 'search']);
    Route::post('/person/update', [PersonController::class, 'update']);
    Route::post('/person/remove', [PersonController::class, 'remove']);
});
