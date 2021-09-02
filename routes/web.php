<?php

use Illuminate\Support\Facades\Route;
use App\Models\Autorizacao;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;

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
    return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => DB::table('posts')->orderBy('updated_at', 'desc')->get()]);
})->name('dashboard');

Route::post('/publicar',[PostController::class,'store'])->name('cadastrar.post');
Route::post('/comentar',[ComentarioController::class,'store'])->name('comentar');
Route::get('/comentarios/{post_id}',[ComentarioController::class,'create'])->name('comentarios.publicacao');