<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;

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

Route::get('/payments', [PaymentsController::class, 'index']);
Route::get('payments/{uuid}', [PaymentsController::class, 'show']);
Route::post('/payments', [PaymentsController::class, 'store']);
Route::delete('/payments/{uuid}', [PaymentsController::class, 'cancel']);
Route::patch('/payments/{uuid}', [PaymentsController::class, 'confirm']);
