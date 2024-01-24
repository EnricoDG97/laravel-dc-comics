<?php

use App\Http\Controllers\Admin\DccomicController;
use App\Http\Controllers\Admin\HomeController;
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

// route del home controller 
Route::get('/', [HomeController::class, 'index'])->name('home');

// route del gruppo di route del controller resource del Dccomic
Route::resource('dccomics', DccomicController::class);