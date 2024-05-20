<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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

    // Public accessible API

Route::post('register', [AuthController::class, 'Userregister']);
Route::post('login', [AuthController::class, 'Userlogin']);

// Authenticated only API
// We use auth api here as a middleware so only authenticated user who can access the endpoint
// We use group so we can apply middleware auth api to all the routes within the group

Route::middleware('auth:api')->group(function() {
    Route::get('view', [UserController::class, 'Userview']);
    Route::post('logout', [AuthController::class, 'userlogout']);

});