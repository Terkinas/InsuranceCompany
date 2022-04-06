<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProfileController;
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
Route::get('/forma/automobilis/edit/{id}', [CarsController::class, 'editForm'])->name("edit_auto");
Route::post('/forma/automobilis/edit/{id}', [CarsController::class, 'update']);

Route::get('/forma/automobilis/delete/{id}', [CarsController::class, 'deleteConfirmation']);
Route::post('/forma/automobilis/delete/{id}', [CarsController::class, 'destroy']);

Route::post('/forma/bustas', [HouseController::class, 'store']);
Route::get('/forma/bustas/edit/{id}', [HouseController::class, 'editForm']);
Route::post('/forma/bustas/edit/{id}', [HouseController::class, 'update']);

Route::get('/forma/bustas/delete/{id}', [HouseController::class, 'deleteConfirmation']);
Route::post('/forma/bustas/delete/{id}', [HouseController::class, 'destroy']);

Route::get('/turtodrauda', [turtoDraudimoForma::class, 'index'])->name('turtodrauda');
Route::get('/turtodrauda/forma', [turtoDraudimoForma::class, 'formType']);

Route::get('/profilis', [ProfileController::class, 'index'])->name('profilis');

Route::get('/admin', [AdminController::class, 'index'])->name("adminpanel");
Route::get('/admin/clients/requests', [AdminController::class, 'clientsReq'])->name("clients_requests");

Route::post('/admin/clients/requests/confirm/{id}', [AdminController::class, 'req_confirmation']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
