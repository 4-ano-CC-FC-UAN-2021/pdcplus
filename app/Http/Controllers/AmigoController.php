<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Http\Request;
use App\Models\Amigo;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AmigoController extends Controller
{
    public function isAmigo($amigo_id){
        $user = Auth::user()->id; 
        $enviado = DB::select( DB::raw("SELECT estado FROM `amigos` WHERE user_id_send = $user and user_id_receive = $amigo_id") );
        if(!$enviado){
            $recebido = DB::select( DB::raw("SELECT estado FROM `amigos` WHERE user_id_send = $amigo_id and user_id_receive = $user") );
            if($recebido && $recebido[0]->estado == 0){//se recebeu o pedido mas não confirmou
                return 2;
            }elseif($recebido && $recebido[0]->estado == 1){//se recebeu o pedido mas confirmou
                return 1;
            }else{//se não recebeu e não enviou
                return -1;
            }
        }elseif($enviado && $enviado[0]->estado == 0){//enviei mas não confirmou 
            return 3;
        }
        return 1;
    }

    public function confirmarAmigo($amigo_id){
        $amigo_id = Crypt::decryptString($amigo_id);
        $user = Auth::user()->id;
        try{
            Amigo::where('user_id_send', $amigo_id)->where('user_id_receive', $user)
                ->update(['estado' => 1]);
        }catch(Exception $e){
            dd("Erro inesperado na confirmação do Pedido de Amizade");
        }
    }

    public function cancelarAmigo($amigo_id){
        $user = Auth::user()->id;
        $amigo_id = Crypt::decryptString($amigo_id);
        try{
            Amigo::where('user_id_send', $user)->where('user_id_receive', $amigo_id)
                ->delete();
        }catch(Exception $e){
            dd("Erro inesperado na confirmação do Pedido de Amizade");
        }
    }


    public function addAmigo($amigo_id){
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
