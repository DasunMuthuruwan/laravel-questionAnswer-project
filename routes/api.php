<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use API\AuthController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function(){
    Route::post('login',[App\Http\Controllers\API\AuthController::class,'login']);
    Route::post('register',[App\Http\Controllers\API\AuthController::class,'register']);
    Route::post('logout',[App\Http\Controllers\API\AuthController::class,'logout']);
    Route::get('refresh', [App\Http\Controllers\API\AuthController::class, 'refresh']);
    Route::get('profile', [App\Http\Controllers\API\AuthController::class, 'userProfile']);
});
