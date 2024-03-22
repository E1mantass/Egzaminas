<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MechanicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Services*/
Route::get('/',[ServiceController::class,'index']);
Route::get('/show-services',[ServiceController::class,'showServices']);
Route::get('/add-service',[ServiceController::class,'addService']);
Route::post('/store/service',[ServiceController::class,'storeService']);
Route::get('/service/delete/{service}',[ServiceController::class,'destroy']);
Route::get('/service/edit/{service}',[ServiceController::class,'edit']);
Route::post('/service/update/{service}',[ServiceController::class,'storeUpdate']);

/*Mechanics*/
Route::get('/show-mechanics',[MechanicController::class,'showMechanics']);
Route::get('/add-mechanic',[MechanicController::class,'create']);
Route::post('/storeMechanic',[MechanicController::class,'store']);
Route::get('/mechanic/delete/{mechanic}',[MechanicController::class,'destroy']);
Route::get('/mechanic/edit/{mechanic}',[MechanicController::class,'edit']);
Route::get('/mechanic/delete/{mechanic}',[MechanicController::class,'destroy']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
