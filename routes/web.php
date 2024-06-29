<?php

use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/producto', [ProductoController::class, 'showAll']);
Route::get('/mayor', [productoController::class, 'getMayor']);

Route::middleware(['auth'])->group(function () {
    Route::resource('pacientes', PacienteController::class);
    Route::post('paciente/crear', [PacienteController::class, "store"]);
    Route::get('pacientes/delete/{paciente_id}', [PacienteController::class, "destroy"]);
    Route::get('municipios_por_departamento/{departamento_id}', [MunicipioController::class, "municipioPorDepartamento"]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
