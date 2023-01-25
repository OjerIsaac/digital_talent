<?php

use App\Http\Controllers\UsersController;
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

//User Api links
Route::prefix("user")->group(function () {
    Route::post('/create', [UsersController::class, 'create']);
    Route::get('/fetch-all', [UsersController::class, 'fetch']);
});
