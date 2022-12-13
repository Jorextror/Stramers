<?php

use App\Http\Controllers\CartaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MazoController;
use App\Http\Controllers\PrePartidaController;
use App\Http\Controllers\TiendaController;


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

//TODO Crear rutas Menu,Tienda,Crear Mazo, Jugar etc...
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');

    // Route::get('/vs', [PrePartidaController::class, 'index'])->name('vs');

    Route::get('/mazo', [MazoController::class, 'index'])->name('mazo');
    Route::get('/new', [MazoController::class, 'new'])->name('new.mazo');


    Route::get('/carta', [CartaController::class, 'index'])->name('carta')->middleware('superadmin');

    Route::get('/updateCarta/{id}', [CartaController::class, 'update'])->name('updateCarta')->middleware('superadmin');

    Route::post('/newCard', [CartaController::class, 'newCard'])->name('newCard')->middleware('superadmin');

    Route::post('/updateCard', [CartaController::class, 'updateCard'])->name('updateCard')->middleware('superadmin');



});
