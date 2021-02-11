<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\GuarnicaoController;
use App\Http\Controllers\MilitarController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ViaturaController;
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

Route::get('/index', function () {
    return view('index');
});


    
Route::group(['middleware' => ['auth:web']], function () {

//rotas referente a entidade Militar
Route::get('/cadastroMilitar', [MilitarController::class, 'adicionar']);
Route::post('/cadastroMilitar', [MilitarController::class, 'salvar']);
Route::get('/listar/militar', [MilitarController::class, 'listar']);
Route::get('/removerMilitar/{id}', [MilitarController::class, 'remover']);
Route::get('/editarMilitar/{id}', [MilitarController::class, 'getEditar']);
Route::post('/editarMilitar', [MilitarController::class, 'editar']);



//rotas referente a entiade Viatura
Route::get('/cadastro/viatura', [ViaturaController::class, 'adicionar']);
Route::post('/cadastro/viatura', [ViaturaController::class, 'salvar']);
Route::get('/listar/viatura', [ViaturaController::class, 'listar']);
Route::get('/remover/viatura/{id}', [ViaturaController::class, 'remover']);
Route::get('/editar/viatura/{id}', [ViaturaController::class, 'getEditar']);
Route::post('/editar/viatura', [ViaturaController::class, 'editar']);

//rotas referente a entiade guarnição
Route::get('/cadastro/guarnicao', [GuarnicaoController::class, 'adicionar']);
Route::post('/cadastro/guarnicao', [GuarnicaoController::class, 'salvar']);
Route::get('/listar/guarnicao', [GuarnicaoController::class, 'listar']);
Route::get('/remover/guarnicao/{id}', [GuarnicaoController::class, 'remover']);
Route::get('/editar/guarnicao/{id}', [GuarnicaoController::class, 'getEditar']);
Route::post('/editar/guarnicao', [GuarnicaoController::class, 'editar']);

//rotas referente a entiade cidade
Route::get('/cadastro/cidade', [CidadeController::class, 'adicionar']);
Route::post('/cadastro/cidade', [CidadeController::class, 'salvar']);
Route::get('/listar/cidade', [CidadeController::class, 'listar']);
Route::get('/remover/cidade/{id}', [CidadeController::class, 'remover']);
Route::get('/editar/cidade/{id}', [CidadeController::class, 'getEditar']);
Route::post('/editar/cidade', [CidadeController::class, 'editar']);

//rotas referente a entiade serviço
Route::get('/cadastro/servico', [ServicoController::class, 'adicionar']);
Route::post('/cadastro/servico', [ServicoController::class, 'salvar']);
Route::get('/listar/servico', [ServicoController::class, 'listar']);
Route::get('/remover/servico/{id}', [ServicoController::class, 'remover']);
Route::get('/editar/servico/{id}', [ServicoController::class, 'getEditar']);
Route::post('/editar/servico', [ServicoController::class, 'editar']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
