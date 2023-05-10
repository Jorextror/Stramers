<?php

use App\Custom\Socket\SocketHandler;
use App\Http\Controllers\CartaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MazoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\PrePartidaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TiendaController;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use BeyondCode\LaravelWebSockets\WebSockets\WebSocketHandler;

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

//DONE Crear rutas Menu,Tienda,Crear Mazo, Jugar etc...
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    //Rutas Web
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');
    Route::post('/sobre', [TiendaController::class, 'sobre'])->name('tienda.sobre');
    Route::post('/AddUserCard', [TiendaController::class, 'addCardToUser'])->name('user.card');

    //Rutas Mensajes
    Route::post('/message', [MensajeController::class, 'new'])->name('user.new.message');//No se usa
    Route::post('/addFriend', [MensajeController::class, 'addFriend'])->name('user.new.friend');
    Route::post('/removeNotification', [MensajeController::class, 'removeNotifiation'])->name('user.eliminar.notificacion');
    Route::post('/friendRequest', [MensajeController::class, 'friendRequest'])->name('user.request.friend');
    Route::post('/getNotifications', [MensajeController::class, 'getNotifications'])->name('user.notifications');

    //Rutas Usuario
    Route::post('/get-friends',[MensajeController::class, 'getFriends'])->name('user.get.friends');
    // Route::get('/vs', [PrePartidaController::class, 'index'])->name('vs');
    //Rutas Mazos
    Route::get('/mazo', [MazoController::class, 'index'])->name('mazo');
    Route::get('/new', [MazoController::class, 'new'])->name('new.mazo');
    Route::get('/settings', [SettingsController::class, 'index'])->name('user.settings');
    Route::post('/AddMazo', [MazoController::class, 'add'])->name('mazo.store');
    Route::post('/changeSettings', [SettingsController::class, 'changeSettings'])->name('user.update.settings');

    //Rutas Super admin
    Route::get('/carta', [CartaController::class, 'index'])->name('carta')->middleware('superadmin');
    Route::get('/updateCarta/{id}', [CartaController::class, 'update'])->name('updateCarta')->middleware('superadmin');
    Route::post('/newCard', [CartaController::class, 'newCard'])->name('newCard')->middleware('superadmin');
    Route::post('/updateCard', [CartaController::class, 'updateCard'])->name('updateCard')->middleware('superadmin');

    //Rutas Socket
    
    WebSocketsRouter::webSocket('/{appkey}/game',SocketHandler::class);


});
