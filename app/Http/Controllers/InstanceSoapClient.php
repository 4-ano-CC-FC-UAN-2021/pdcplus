<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
 
class InstanceSoapClient extends BaseSoapController implements InterfaceInstanceSoap
{
    public static function init(){
        $wsdlUrl = Self::getWsdl();
        $soapClientOptions = [
            'stream_context' => self::generateContext(),
            'cache_wsdl'     => WSDL_CACHE_NONE
        ];

        return new SoapClient($wsdlUrl, $soapClientOptions);
    }
}