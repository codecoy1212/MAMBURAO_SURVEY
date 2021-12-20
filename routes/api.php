<?php

use App\Http\Controllers\MamburaoController;
use App\Http\Controllers\MobileController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ADD DATA
Route::post('/mobile/categories/add',[MobileController::class,'add_cat']);
Route::post('/mobile/mcqs/add',[MobileController::class,'add_mcq']);
Route::post('/mobile/questions/add',[MobileController::class,'add_que']);
Route::post('/mobile/databases/add',[MobileController::class,'add_db']);
Route::post('/mobile/users/add',[MobileController::class,'add_user']);
Route::post('/mobile/surveys/add',[MobileController::class,'add_sur']);
Route::post('/mobile/answers/add',[MobileController::class,'add_ans']);

// ACTUAL ALL
Route::get('/mobile/categories/show',[MamburaoController::class,'get_cat']);
Route::post('/mobile/login',[MamburaoController::class,'login']);
Route::post('/mobile/answers/give',[MamburaoController::class,'give_ans']);
