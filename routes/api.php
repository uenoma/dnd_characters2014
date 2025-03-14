<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/characters/{id}', [CharacterController::class, 'show']);

Route::post('/characters', [CharacterController::class, 'store']);
Route::post('/characters', [CharacterController::class, 'update']);

Route::delete('/characters/{id}', [CharacterController::class, 'destroy']);

