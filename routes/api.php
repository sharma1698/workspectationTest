<?php

use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TutorProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('tutor-products', [TutorProductController::class, 'index']);
Route::post('tutor-products', [TutorProductController::class, 'store']);
Route::get('tutor-products/{id}', [TutorProductController::class, 'show']);
Route::put('tutor-products/{id}', [TutorProductController::class, 'update']);
Route::delete('tutor-products/{id}', [TutorProductController::class, 'destroy']);

Route::get('teams', [TeamController::class, 'index']);
Route::post('teams', [TeamController::class, 'store']);
Route::get('teams/{id}', [TeamController::class, 'show']);
Route::put('teams/{id}', [TeamController::class, 'update']);
Route::delete('teams/{id}', [TeamController::class, 'destroy']);