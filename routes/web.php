<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PropertiesController;

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


Route::get('health', function () {
    return "OK";
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); 
 


Route::middleware('auth')->group(function () { 
    Route::get('/file-view', [UploadController::class, 'fileview'])->name('fileviews');
    Route::post('/file-upload', [UploadController::class, 'uploadTheFile'])->name('uploadTheFile');
});

require __DIR__.'/auth.php';
