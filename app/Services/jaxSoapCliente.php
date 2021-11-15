<?php

/**
 * Description of jaxSoapCliente
 *
 * @author 
 */

namespace App\Services;

use SoapClient;

class jaxSoapCliente extends SoapClient{
    //put your code here
    public function __Call($function_name, $arguments) {
        $recebe =parent::__Call($function_name, $arguments);
        return $recebe;
    }
}
