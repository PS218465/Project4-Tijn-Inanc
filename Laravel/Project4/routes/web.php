<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\WinkelmandjeController;
use App\Http\Controllers\BestellenController;
use App\Http\Controllers\HomeController;
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


Route::resource('menu', MenuController::class)->only(['index','show']);
Route::resource('winkelmandje', WinkelmandjeController::class)->only(['index','show','store','destroy','update'])->middleware('auth');
Route::resource('bestellen', BestellenController::class)->only(['store'])->middleware('auth');

Route::get('/BestDev',function(){
    return "Tijn Knapen & Inanc Ozdemir";
});

//----------------------------------------------------------------
Route::get('/', [HomeController::class,'index']);
Route::resource('status', HomeController::class)->only(['show','destroy'])->middleware('auth');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
