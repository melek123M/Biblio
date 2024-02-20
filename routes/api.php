<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('livres', App\Http\Controllers\API\LivreAPIController::class)
    ->except(['create', 'edit']);

Route::resource('specialites', App\Http\Controllers\API\SpecialiteAPIController::class)
    ->except(['create', 'edit']);

Route::resource('editeurs', App\Http\Controllers\API\EditeurAPIController::class)
    ->except(['create', 'edit']);

Route::resource('auteurs', App\Http\Controllers\API\AuteurAPIController::class)
    ->except(['create', 'edit']);