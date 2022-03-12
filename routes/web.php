<?php

namespace Frota\Http\Controllers;

use Frota\Models\Usuario;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Frota\Http\Controllers;

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
//Tela principal 
Route::get('/', function () {
    return view('login');
})->name('acessar');
//Tela do Administrativo
Route::get('/funcionarios', [UserController::class, 'lista']);
Route::get('/detalhe', [UserController::class, 'mostrar'])->middleware('auth');
Route::get('/editar/{id}',[UserController::class, 'editar'])->name('editar')->middleware('auth');
Route::post('/users/{id}',[UserController::class, 'atualizar'])->middleware('auth');
Route::post('/upsenhaADM/{id}',[LoginController::class, 'updateSenhaADM'])->middleware('auth');
//Tela do Administrativo da escola
Route::post('/registrarEscola',[UserController::class,'registroEscola'])->middleware('auth');
Route::get('/escolas', [UserController::class, 'listaEscola'])->middleware('auth');
Route::get('/detalheEscola{id}', [UserController::class, 'mostrarEscola'])->name('detalheEscola')->middleware('auth');
Route::get('/editarEscola/{id}',[UserController::class, 'editarEscola'])->name('editarEscola')->middleware('auth');
Route::get('/deletarEscola/{id}',[UserController::class,'deletarEscola'])->name('deletarEscola')->middleware('auth');
Route::post('/schools/{id}',[UserController::class, 'atualizarEscola'])->middleware('auth');
//Tela do Administrativo de veiculos
Route::post('/registrarVeiculo',[UserController::class,'registroVeiculo']);
Route::get('/veiculos', [UserController::class, 'listaVeiculo'])->middleware('aut');
Route::get('/detalheVeiculo', [UserController::class, 'mostrarVeiculo'])->middleware('auth');
Route::get('/editarVeiculo/{id}',[UserController::class, 'editarVeiculo'])->name('editarVeiculos')->middleware('auth');
Route::get('/deletarVeiculo/{id}',[UserController::class,'deletarVeiculo'])->middleware('auth');
Route::post('/car/{id}',[UserController::class, 'atualizarVeiculo'])->middleware('auth');
//Tela de Cadastro de Escola 
Route::get('/cadastroEscola', function(){
    return view('cad_escola');
})->name('cadEscola')->middleware('auth');
//Tela de Cadastro de Veiculos
Route::get('/cadastroVeiculo', function(){
    return view('cad_car');
})->name('cadCar')->middleware('auth');
//Tela de Cadastro do Usuario 
 Route::get('/cadastro', function(){
     return view('cadastro');
 })->name('cad_usu');
 //Tela de Alterar Senha 
 Route::get('/senha/{id}',[UserController::class,'mostrarSenha'])->name('senha')->middleware('auth');
 //Tela de Cadastro do Motorista
 Route::get('/cadastroMoto', function(){
    return view('cad_moto');
})->name('cadMoto')->middleware('auth');
// tela do Administrativo do cadastro do Motorista
Route::get('/motorista',[UserController::class,'listarMoto'])->middleware('auth');
Route::post('/regimoto',[LoginController::class,'registroMoto'])->middleware('auth');
Route::get('/buscaMoto/{id}',[UserController::class,'mostrarMoto'])->middleware('auth');
Route::post('/atualizaMoto/{id}',[UserController::class,'atualizarMoto'])->middleware('auth');
Route::get('/deletarMoto/{id}',[UserController::class,'deletaMoto'])->middleware('auth');
Route::get('/editarMoto/{id}',[UserController::class,'editaMoto'])->middleware('auth');
//Tela de Login
Route::post('/acesso',[LoginController::class,'LoginUsuario']);
//Tela do administrativo do Usuario {Alterar, Buscar, Deletar,}
Route::get('/busca/{id}',[UserController::class,'mostrar'])->name('busca')->middleware('auth');
Route::get('/deletar/{id}',[UserController::class,'deletar'])->middleware('auth');
Route::post('/registrar',[LoginController::class,'registro']);
//Tela do Calendario 
Route::get('/usuario',[FullCalendarController::class,'index'])->name('usuario')->middleware('auth');
//Eventos do calendario
Route::get('/load-events/{id}',[EventController::class,'loadEvents'])->middleware('auth');
Route::post('/load-update/{id}',[EventController::class,'update'])->middleware('auth');
Route::post('usuario/armazena',[EventController::class,'store'])->middleware('auth');
Route::delete('/excluir/{id}',[EventController::class,'deletar'])->middleware('auth');
//sair do sistema
Route::get('/logout',[LoginController::class,'logout']);
//verificar se o CPF já exite no banco de dados
Route::post('/verify/cpf', [UserController::class,'perfil']);
//Rotas de busca
Route::any('funcionarios/search',[UserController::class,'search'])->name('funcionarios.search')->middleware('auth');
Route::any('motorista/search',[UserController::class,'search2'])->name('motorista.search')->middleware('auth');
Route::any('escolas/search',[UserController::class,'search3'])->name('escolas.search')->middleware('auth');
Route::any('veiculos/search',[UserController::class,'search4'])->name('veiculos.search')->middleware('auth');
//gerar arquivo PDF
Route::get('/gerarPDF/{id}',[EventController::class,'pdfCreate']);
Route::get('/gerarPDF1',[EventController::class,'pdfCreate1']);
//login social com facebook
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
Route::get('/acessoSocial',[LoginController::class,'LoginUsuario'])->name('loginSocial');
Route::post('/registrarSocial',[LoginController::class,'registroSocial'])->name('cadastrasocial');

Auth::routes();
//POLITICA DE PRIVACIDADE
Route::get('/privacidade', function () {
    return view('privacidade.politica');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
