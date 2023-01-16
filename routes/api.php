<?php

use App\Http\Controllers\API\SneakerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/sneaker', [SneakerController::class, 'index']);
Route::get('/sneaker/{id}', [SneakerController::class, 'show']);
Route::post('/sneaker', [SneakerController::class, 'create']);
Route::put('/sneaker/{id}', [SneakerController::class, 'update']);
Route::delete('/sneaker/{id}', [SneakerController::class, 'delete']);
