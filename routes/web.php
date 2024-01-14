<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginCtrl;
use App\Http\Controllers\SignupCtrl;
use App\Http\Controllers\HomeCtrl;
use App\Http\Controllers\biodataCtrl;

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

Route::get('/',[LoginCtrl::class, 'index']);
Route::post('/', [LoginCtrl::class, 'loginProcess']);
Route::post('/logout', [LoginCtrl::class, 'logout']);
Route::get('/signup',[SignupCtrl::class, 'index']);
Route::post('/AddUser', [SignupCtrl::class, 'create']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/biodata/{id}', [biodataCtrl::class, 'index']);
    Route::put('/EditUser/{id}', [biodataCtrl::class, 'update']);
    Route::get('/detail/{id}', [biodataCtrl::class, 'editDetail']);
    Route::get('/get3Array/{id}', [biodataCtrl::class, 'get3Array']);
    Route::post('/delete', [biodataCtrl::class, 'destroy']);

    Route::group(['middleware' => ['CheckLevel:admin']], function () {
        Route::get('/home', [HomeCtrl::class, 'index']);
    });

});