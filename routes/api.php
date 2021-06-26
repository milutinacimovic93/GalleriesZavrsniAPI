<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GallerieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;


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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', [ AuthController::class, 'register' ])->middleware('guest:api');
Route::post('login', [ AuthController::class, 'login' ])->middleware('guest:api')->name('login');
Route::post('logout', [ AuthController::class, 'logout' ])->middleware('auth:api');
Route::get('me', [ AuthController::class, 'me' ])->middleware('auth:api');


Route::get('/galleries',[GallerieController::class,'index']);
Route::get('/galleries/{id}',[GallerieController::class,'show']);
Route::post('/galleries', [GallerieController::class, 'store']);

Route::middleware('api')->get('/user/{id}',[UserController::class,'show']);

Route::post('/comments',[CommentController::class,'store'])->middleware('auth:api');
Route::get('/galleries/{id}/comments', [CommentController::class, 'index']);
Route::delete('/comments/{id}', [CommentController::class, 'destroy']);


