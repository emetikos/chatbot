<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableController;
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

Route::get('/', [HomeController::class, 'index']);

//Route::get('/store', [TableController::class, 'store']);
//Route::get('/same', [TableController::class, 'retrieve_same']);

//Route::get('/', function () {
//    return view('welcome');
//});

Route:: get ('/delete', [TableController::class,'delete_function']);

Route:: get ('/update', [TableController::class,'update']);