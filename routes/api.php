<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    // Route::put('/characters/{id}', [CharacterController::class, 'update']);
    Route::get('/characters', [CharacterController::class, 'index']);
    Route::get('/characters/{id}', [CharacterController::class, 'show']);
    Route::post('/characters.store', [CharacterController::class, 'store']);
    Route::post('/characters.update/{id}', [CharacterController::class, 'update']);
    Route::delete('/characters.delete/{id}', [CharacterController::class, 'destroy']);
});
