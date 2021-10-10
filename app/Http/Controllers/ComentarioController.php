<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Contracts\Encryption\DecryptException;

class ComentarioController extends Controller
{
    public function create($post_id){
        $comentariosDoPost = Post::find(Crypt::decryptString($post_id))->comentarios;
        return view('comentario.post', ['posts' => Post::find(Crypt::decryptString($post_id)), 'comentarios' => $comentariosDoPost]);
    }
    
    public function store(Request $request){
        $comentario = new Comentario;
        $comentario->comentario = $request->comentario;
        $comentario->post_id = $request->post_id;
        $comentario->user_id = Auth::user()->id;
        $comentario->save(); 
        return redirect()->route('comentarios.publicacao', Crypt::encryptString($request->post_id));
        //return view('comentario.post', ['posts' => Post::find($request->post_id), 'comentarios' => $comentariosDoPost]);
    }

    public function countComenterios($id){
        return count(Post::find($id)->comentarios);
    }
}
