<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\JUDDI;
use App\Services\jaxSoapCliente;


class ConsumerJuddiController extends Controller
{
    public function service($servico){

        $juddi = new JUDDI();
        $juddi->conectar("root", "root");
        $wsdl = $juddi->getBinding($servico);
        $wsdlRemote = str_replace("192.168.43.185", "192.168.43.185", $wsdl);
        
        $cliente = new jaxSoapCliente($wsdlRemote);
        return $cliente;
    }
        
}
