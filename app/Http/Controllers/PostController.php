<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Autorizacao;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(){
        return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => Post::all()]);
    }

    public function store(StorePostRequest $request){
        $a = $request->validated();
        $post = new Post;
        $post->legenda = $request->legenda;
        $post->tipo = $request->tipo;
        $post->autorizacao_id = $request->autorizacao;
        $post->user_id = Auth::user()->id;
        $post->save();
        return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => Post::all()]);
    }
}
