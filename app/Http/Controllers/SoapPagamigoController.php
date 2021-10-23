<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseSoapController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\FuncCall;
use SimpleXMLElement;

class SoapPagamigoController extends BaseSoapController
{
    private $service;

    public function __construct()
    {
        self::setWsdl('http://192.168.122.87:8686/PagaAmigo?wsdl');
        $this->service = InstanceSoapClient::init();
    }

    public function consultarSaldo(){
        try {
            $contas = $this->service->consultarSaldo(['user'=> Auth::user()->id]);
            return $contas;
        } catch (\Exception $e) {
            return "Saldo indisponivel";
        }
    }

    public function deposito($valor){
        try {
            $contas = $this->service->depositarSaldo(['Cid'=> Auth::user()->id, 'credito' => $valor]);
            return $contas;
        } catch (\Exception $e) {
            return "Saldo indisponivel";
        }
    }
    
    public function pagarConteudo($valor,$preco,$creditar_id,$post_id){
        $user = Auth::user()->id;
        $creditar = Crypt::decrypt($creditar_id);
        $post_id = Crypt::decrypt($post_id);
        $valor = Crypt::decrypt($preco);
        try {
            $contas = $this->service->pagarConteudo(['idD'=> $user,'idC'=>$creditar,'idP'=>$post_id ,'valor' => $valor]);
            
        } catch (\Exception $e) {
            return "Saldo indisponivel";
        }
        return redirect()->route('dashboard');
    }

    
}

