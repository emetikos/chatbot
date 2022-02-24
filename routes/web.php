<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/target-page', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'home']);
//Route::post('query', [HomeController::class, 'query']);
//Route::post('/query', [HomeController::class, 'ajaxQuery']);
Route::post('/query', [HomeController::class, 'api']);

Route::post('/upload/pdf', [UploadController::class, 'pdf']);

//Route::get('/store', [TableController::class, 'store']);
//Route::get('/same', [TableController::class, 'retrieve_same']);
//Route::get('/test', [TableController::class, 'test']);

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/topicFound', [HomeController::class, 'api']);
