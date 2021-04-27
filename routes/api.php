<?php

use App\Http\Controllers\DeveloperController;
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

Route::get('/get-developers', [DeveloperController::class, 'getDevelopers']);
Route::post('/add-developer', [DeveloperController::class, 'addDeveloper']);
Route::put('/update-developer', [DeveloperController::class, 'updateDeveloper']);
Route::delete('/delete-developer/{id}', [DeveloperController::class, 'deleteDeveloper']);
