<?php

use Illuminate\Support\Facades\Route;
use App\Models\Autorizacao;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AmigoController;
use App\Http\Controllers\SoapPagamigoController;
use App\Http\Controllers\PagamigoController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $pubs = new PostController;
    $pedidos = new AmigoController;
    $saldo = new SoapPagamigoController;
    return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => $pubs->publicacoes(), 'pedidos'=>$pedidos->pedidosRecebidos(),'saldo'=>$saldo->consultarSaldo()]);
})->name('dashboard');

Route::post('/busca',[UserController::class,'busca'])->name('search')->middleware('auth');
Route::get('/busca/{info}',[UserController::class,'resultados'])->name('results')->middleware('auth');
Route::post('/publicar',[PostController::class,'store'])->name('cadastrar.post')->middleware('auth');
Route::post('/comentar',[ComentarioController::class,'store'])->name('comentar')->middleware('auth');
Route::get('/comentarios/{post_id}',[ComentarioController::class,'create'])->name('comentarios.publicacao')->middleware('auth');
Route::get('/addamigo/{amigo_id}',[AmigoController::class,'addAmigo'])->name('add.amigo')->middleware('auth');
Route::get('/confirmar/{amigo_id}',[AmigoController::class,'confirmarAmigo'])->name('confirmar.amigo')->middleware('auth');
Route::get('/cancelar/{amigo_id}',[AmigoController::class,'cancelarAmigo'])->name('cancelar.amigo')->middleware('auth');
Route::get('/sair',[UserController::class,'sair'])->name('sair')->middleware('auth');
Route::get('/deposito',[PagamigoController::class,'deposito'])->name('create.deposito')->middleware('auth');
Route::post('/pagamigo/deposito/',[PagamigoController::class,'depositoPagamigo'])->name('concluir.deposito')->middleware('auth');
Route::get('/preco/{pub}',[PostController::class,'conteudoPreco'])->name('definir.preco')->middleware('auth');
Route::post('/preco/concluir/',[PostController::class,'definirPrecoConteudo'])->name('concluir.preco')->middleware('auth');
Route::get('/pagamento/{creditar_id}/{valor}/{saldo}/{post_id}',[PagamigoController::class,'confirmarPagamento'])->name('pagar.conteudo')->middleware('auth');
Route::post('/concluir/compra/',[PagamigoController::class,'concluirPagamento'])->name('concluir.pagamento')->middleware('auth');
