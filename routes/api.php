<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// // 將需要帶 Token 才能使用的 API 放在下面的 Route::group
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/logout', [AuthController::class, 'logout']);
// });


Route::group(['middleware' => ['web'], 'prefix'=>'user'], function(){
    Route::post('login', [UserController::class, 'login']);
    Route::get('loginStatus', [UserController::class, 'loginStatus']);
    Route::post('signUp', [UserController::class, 'signUp']);
    Route::get('logout', [UserController::class, 'logout']);
});