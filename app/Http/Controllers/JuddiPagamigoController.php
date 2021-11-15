<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ConsumerJuddiController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class JuddiPagamigoController
{
    private $service = "PagAmigo";

    public function consultarSaldo(){
        $service = new ConsumerJuddiController;
        try {
            $contas = $service->service($this->service)->consultarSaldo(['user'=> Auth::user()->id]);
            return $contas;
        } catch (\Exception $e) {
            return "Saldo indisponivel";
        }
    }

    public function deposito($valor){
        $service = new ConsumerJuddiController;
        try {
            $contas = $service->service($this->service)->depositarSaldo(['Cid'=> Auth::user()->id, 'credito' => $valor]);
            return $contas;
        } catch (\Exception $e) {
            return "Saldo indisponivel";
        }
    }
    
    public function pagarConteudo($valor,$preco,$creditar_id,$post_id){
        $service = new ConsumerJuddiController;
        $user = Auth::user()->id;
        $creditar = Crypt::decrypt($creditar_id);
        $post_id = Crypt::decrypt($post_id);
        $valor = Crypt::decrypt($preco);
        try {
            $contas = $service->service($this->service)->pagarConteudo(['idD'=> $user,'idC'=>$creditar,'idP'=>$post_id ,'valor' => $valor]);
            
        } catch (\Exception $e) {
            return "Saldo indisponivel";
        }
        return redirect()->route('dashboard');
    }

    public function consultarMovimento($post_id){
        $service = new ConsumerJuddiController;
        try {
            $contas = $service->service($this->service)->consultarMovimento(['cPub'=> $post_id, 'cUse'=> Auth::user()->id]);
            return $contas;
        } catch (\Exception $e) {
            return "Serviço indisponivel";
        }
    }
}

