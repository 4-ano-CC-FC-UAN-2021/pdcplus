<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    
    public function store(Request $request){
        $comentario = new Comentario;
        $comentario->comentario = $request->comentario;
        $comentario->post_id = $request->post_id;
        $comentario->user_id = Auth::user()->id;
        $comentario->save();
    }
}
