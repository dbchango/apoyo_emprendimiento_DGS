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
    if (auth()->check() && auth()->user()->is_admin==true)
            return view('admin.index');
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('livewire.emprendedor.index');
})->name('dashboard');



//Route Hooks - Do not delete//
Route::view('negocios', 'livewire.negocios.index')->middleware('auth');
Route::view('requisito_cumplidos', 'livewire.requisito-cumplidos.index')->middleware('auth');
Route::view('anexos', 'livewire.anexos.index')->middleware('auth');
Route::view('pre_requisitos', 'livewire.pre-requisitos.index')->middleware('auth');
Route::view('requisitos', 'livewire.requisitos.index')->middleware('auth');
Route::view('tipo_de_persona', 'livewire.tipo-de-personas.index')->middleware('auth');
Route::view('organizaciones_regulatorias', 'livewire.organizaciones-regulatorias.index')->middleware('auth');
//Route::view('emprendedor', 'livewire.emprendedor.index')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
