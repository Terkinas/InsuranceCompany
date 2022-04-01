<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\turtoDraudimoForma;
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
    if(auth()->user()) {
        return view('dashboard');
    }
    else {
        return view('guests');
    }
});

Route::post('/turtodrauda/pateikti', [turtoDraudimoForma::class, 'verifyUser']);
Route::post('/forma/automobilis', [CarsController::class, 'store']);

Route::get('/turtodrauda', [turtoDraudimoForma::class, 'index'])->name('turtodrauda');
Route::get('/turtodrauda/forma', [turtoDraudimoForma::class, 'formType']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
