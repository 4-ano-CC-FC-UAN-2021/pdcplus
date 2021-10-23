<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseSoapController;
use Exception;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\FuncCall;
use SimpleXMLElement;

class SoapController extends BaseSoapController
{
    private $service;

    public function __construct()
    {
        self::setWsdl('http://192.168.122.88:8686/Largacaixa?wsdl');
        $this->service = InstanceSoapClient::init();
    }

    public function guardarPost($idP,$descricao,$tipo,$preco){

        try {
            $contas = $this->service->criarConteudo(['idP'=>$idP, 'descricao'=> $descricao, 'tipo'=>$tipo,'preco'=>$preco]);
            return "sucesso";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function consultarConteuto($idP){
        $ftp = new FtpController;
        $contas = $this->service->consultarConteudo(['idPubli'=>$idP]);
        if(isset($contas->return->descricao)){
            $ftp->getFilesFtp($contas->return->descricao);
            return $contas->return;
        }
        return null;
    }

    public function actualizarPreco($preco,$post_id){
        try{
            $contas = $this->service->actualizarPreco(['cPu'=>Crypt::decrypt($post_id), 'preco1' => $preco]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

}
