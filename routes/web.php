<?php

use App\Http\Controllers\Payments\mpesa\MPESAController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::post('get-token', [MPESAController::class, 'getAccessToken']);
Route::post('register-urls',[MPESAController::class, 'registerURLS']);
Route::post('simulate',[MPESAController::class, 'simulateTransaction']);

