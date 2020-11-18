<?php

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
    return view('content.slider');
});

Route::get('/tattoos', [App\Http\Controllers\WebController::class, 'getTattoos'])->name('tattoos');
Route::get('/pinturas', [App\Http\Controllers\WebController::class, 'getPinturas'])->name('pinturas');
Route::get('/cotizar', [App\Http\Controllers\WebController::class, 'cotizar'])->name('cotizar');
Route::get('/ver-tattoo/{id}', [App\Http\Controllers\WebController::class, 'verTattoo'])->name('verTattoo');
Route::get('/ver-pintura/{id}', [App\Http\Controllers\WebController::class, 'verPintura'])->name('verPintura');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/tattoo', [App\Http\Controllers\TattooController::class, 'index'])->name('tattoo')->middleware('auth');
Route::get('/pintura', [App\Http\Controllers\PinturaController::class, 'index'])->name('pintura')->middleware('auth');
Route::get('/subir-tattoo', [App\Http\Controllers\TattooController::class, 'create'])->name('createTattoo')->middleware('auth');
Route::get('/subir-pintura', [App\Http\Controllers\PinturaController::class, 'createPintura'])->name('createPintura')->middleware('auth');
Route::post('/guardar-tattoo', [App\Http\Controllers\TattooController::class, 'store'])->name('guardar-tattoo')->middleware('auth');
Route::post('/guardar-pintura', [App\Http\Controllers\PinturaController::class, 'store'])->name('guardar-pintura')->middleware('auth');
Route::get('/tattoos/{filename}', [App\Http\Controllers\TattooController::class, 'getImage'])->name('tattoo-file');
Route::get('/pinturas/{filename}', [App\Http\Controllers\PinturaController::class, 'getImage'])->name('pintura-file');
Route::get('/eliminar-tattoo/{id}', [App\Http\Controllers\TattooController::class, 'destroy'])->name('eliminar-tattoo')->middleware('auth');
Route::get('/eliminar-pintura/{id}', [App\Http\Controllers\PinturaController::class, 'destroy'])->name('eliminar-pintura')->middleware('auth');
Route::post('/actualizar-tattoo/{id}', [App\Http\Controllers\TattooController::class, 'update'])->name('actualizar-tattoo')->middleware('auth');
Route::post('/actualizar-pintura/{id}', [App\Http\Controllers\PinturaController::class, 'update'])->name('actualizar-pintura')->middleware('auth');
Route::get('/editar-tattoo/{id}', [App\Http\Controllers\TattooController::class, 'edit'])->name('editar-tattoo')->middleware('auth');
Route::get('/editar-pintura/{id}', [App\Http\Controllers\PinturaController::class, 'edit'])->name('editar-pintura')->middleware('auth');
