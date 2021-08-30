<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Autorizacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function create(){
        return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => DB::table('posts')->orderBy('updated_at', 'desc')->get()]);
    }

    public function store(StorePostRequest $request){
        $a = $request->validated();
        $post = new Post;
        $post->legenda = $request->legenda;
        $post->tipo = $request->tipo;
        $post->autorizacao_id = $request->autorizacao;
        $post->user_id = Auth::user()->id;
        $post->save();
        return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => DB::table('posts')->orderBy('updated_at', 'desc')->get()]);
    }
}
