<?php

use Illuminate\Support\Facades\Route;
use App\Models\Autorizacao;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UserController;

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
    $pubs= new PostController;
    return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => $pubs->publicacoes()]);
})->name('dashboard');

Route::post('/busca',[UserController::class,'busca'])->name('search')->middleware('auth');
Route::get('/busca/{info}',[UserController::class,'resultados'])->name('results')->middleware('auth');
Route::post('/publicar',[PostController::class,'store'])->name('cadastrar.post')->middleware('auth');
Route::post('/comentar',[ComentarioController::class,'store'])->name('comentar')->middleware('auth');
Route::get('/comentarios/{post_id}',[ComentarioController::class,'create'])->name('comentarios.publicacao')->middleware('auth');
Route::get('/addamigo/{amigo_id}',[UserController::class,'add'])->name('add.amigo');