<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\ConsumerJuddiController;

class LargaCaixaController
{
    private $service = "LargaCaixa";

    public function guardarPost($idP,$descricao,$tipo,$preco){
        $service = new ConsumerJuddiController;
        try {
            $contas = $service->service($this->service)->criarConteudo(['idP'=>$idP, 'descricao'=> $descricao, 'tipo'=>$tipo,'preco'=>$preco]);
            return "sucesso";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function consultarConteuto($idP){
        $service = new ConsumerJuddiController;
        $ftp = new FtpController;

        $contas = $service->service($this->service)->consultarConteudo(['idPubli'=>$idP]);
        if(isset($contas->return->descricao)){
            $ftp->getFilesFtp($contas->return->descricao);
            return $contas;
        }
        return null;
    }


    public function actualizarPreco($preco,$post_id){
        $service = new ConsumerJuddiController;
        try{
            $contas = $service->service($this->service)->actualizarPreco(['cPu'=>Crypt::decrypt($post_id), 'preco1' => $preco]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

}
