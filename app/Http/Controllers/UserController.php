<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Amigo;
use App\Http\Controllers\AmigoController;
use Exception;

class UserController extends Controller
{
    public function resultados($info){
        $amigo = new AmigoController;
        $dado = Crypt::decryptString($info);
        $resultados = DB::select( DB::raw("SELECT id, name, username, email FROM `users` WHERE name like '%$dado%' or username like '%$dado%' or email like '%$dado%'") );
        $amigos = array();
        foreach ($resultados as $resultado) {
            $resultado->estado = $amigo->isamigo($resultado->id);
            array_push($amigos, $resultado);
        }
        $amigos = (object) $amigos;
        return view('resultados.inicial',['results' => $amigos]);
    }


    public function busca(Request $request){
        return redirect()->route('results', Crypt::encryptString($request->busca));
    }

}
