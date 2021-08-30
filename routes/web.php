<?php

use Illuminate\Support\Facades\Route;
use App\Models\Autorizacao;
use App\Models\Post;

use App\Http\Controllers\PostController;
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
    return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => Post::all()]);
})->name('dashboard');

Route::post('/publicar',[PostController::class,'store'])->name('cadastrar.post');
