<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\AcertijoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\SupAcertijoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ThorTicketController;
use App\Http\Controllers\ThorPagaController;
use App\Http\Controllers\PublicidadController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\BoleteriaController;
use App\Http\Controllers\PremioController;
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
   return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('client', AdminController::class)->middleware('auth','role:admin');
Route::put('client/{id}/delete',  [AdminController::class,'changeId'])->middleware('auth','role:admin');
Route::resource('acertijo', AcertijoController::class)->middleware(['auth','role:admin|acertijero|supacertijero']);
Route::resource('race',CarreraController::class)->middleware(['auth','role:admin|admincarrera|supcarrera']);
Route::get('/raceAll',[CarreraController::class,'RaceAll'])->name('raceAll')->middleware('auth');
Route::get('tons/{id}',[CarreraController::class,'getAcertijo']);
Route::put('/updateConfig',[CarreraController::class,'updateConfig'])->name('updateConfig');
Route::resource('codes', CodeController::class)->middleware('auth','role:admin|adminticket');
Route::DELETE('/myproductsDeleteAll', [CodeController::class, 'deleteAll']);
Route::resource('cash', ThorPagaController::class)->middleware('auth');
Route::resource('ticket', ThorTicketController::class)->middleware('auth');
Route::resource('publicidad', PublicidadController::class)->middleware(['auth','role:admin|adminpublicidad']);
Route::get('publicidad/{id}/view',[PublicidadController::class,'getPublicidad'])->middleware('auth');
Route::get('twons/{id}',[PublicidadController::class,'getPosicion']);
Route::resource('users', ClientController::class)->middleware(['auth','role:admin|adminusuario|acliente']);
Route::get('winner',[ClientController::class,'Winner'])->middleware(['auth','role:admin|adminusuario|acliente']);
Route::get('userwinner',[ClientController::class,'UserWinner'])->middleware(['auth','role:admin|adminusuario|acliente']);
Route::resource('reclamo', ReclamoController::class)->middleware(['auth','role:admin|adminreclamo']);
Route::resource('atencion',AtencionController::class)->middleware('auth');
Route::get('transactions',[BoleteriaController::class,'transactions'])->middleware('auth');
Route::get('export',[ClientController::class,'Export'])->name('export');


// rutas adicionales de cambio de switch
Route::get('changeUse',[AcertijoController::class,'changeUse'])->name('changeUse');
Route::get('changeUsePaga',[ThorPagaController::class,'changeUsePaga'])->name('changeUsePaga');
Route::get('changeUseTicket',[ThorTicketController::class,'changeUseTicket'])->name('changeUseTicket');

//Premio
   Route::resource('solicitudes', PremioController::class);
   Route::post('pagar/{id}', [PremioController::class, 'updateStatus'])->name('pagar');

//Ruta de envio de Reclamo

 Route::post('/message',[ReclamoController::class,'Message'])->name('message');
