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
Route::get('/', [HomeController::class, 'home']);
Route::get('/chatbot', [HomeController::class, 'chatbot']);

//Route::get('/target-page', [HomeController::class, 'index']);

Route::post('/query', [HomeController::class, 'api']);

Route::post('/analyse', [HomeController::class, 'analyse']);

Route::get('/topicFound', [HomeController::class, 'api']);

Route::get('/test', [TableController::class, 'test']);

Route::get('/flash', [HomeController::class, 'flashSession']);

Route::get('/delete', [TableController::class,'delete_function']);

Route::post('/save', [TableController::class,'saveLink']);
