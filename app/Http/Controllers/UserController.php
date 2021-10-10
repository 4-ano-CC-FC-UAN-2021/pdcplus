<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Amigo;
use Exception;

class UserController extends Controller
{
    public function resultados($info){
        $dado = Crypt::decryptString($info);
        $resultados = DB::select( DB::raw("SELECT id, name, username, email FROM `users` WHERE name like '%$dado%' or username like '%$dado%' or email like '%$dado%'") );
        return view('resultados.inicial',['results' => $resultados]);
    }


    public function busca(Request $request){
        return redirect()->route('results', Crypt::encryptString($request->busca));
    }

    public function add($amigo_id){
        try{
            $amigo_id = Crypt::decryptString($amigo_id);
            $amigo = new Amigo;
            $amigo->user_id_send = Auth::user()->id;
            $amigo->user_id_receive = $amigo_id;
            $amigo->estado = 0;
            $amigo->save();
        }catch(Exception $e){
            dd("Pedido reretido");
        }
    }
}
