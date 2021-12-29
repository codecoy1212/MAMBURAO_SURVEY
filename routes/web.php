<?php

use App\Http\Controllers\LoginOutController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/nene',[WebController::class,'index1'])->name('nene');
Route::get('/philip',[WebController::class,'index2'])->name('philip');
Route::get('/eric',[WebController::class,'index3'])->name('eric');

Route::get('/dashboard',[WebController::class,'index'])->name('dash');
Route::get('/table/{id}',[WebController::class,'data_table'])->name('table_d');
Route::get('/specific',[WebController::class,'table_show']);
Route::get('/specific/update',[WebController::class,'update_pass']);
Route::put('/specific/update/done',[WebController::class,'pass_changed']);
Route::get('/settings',[WebController::class,'index4'])->name('set');

Route::get('/login',[LoginOutController::class,'index']);
Route::post('/login',[LoginOutController::class,'loggingIn'])->name('log');
Route::get('/logout',[LoginOutController::class,'logged_out'])->name('logo');
