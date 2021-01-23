<?php

use App\Http\Controllers\MilitarController;
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
    return view('home');
});




Route::get('/cadastroMilitar', [MilitarController::class, 'adicionar']);

Route::post('/cadastroMilitar', [MilitarController::class, 'salvar']);
Route::get('/listar', [MilitarController::class, 'listar']);
Route::get('/removerMilitar/{id}', [MilitarController::class, 'remover']);
Route::get('/editarMilitar/{id}', [MilitarController::class, 'getEditar']);
Route::post('/editarMilitar', [MilitarController::class, 'editar']);