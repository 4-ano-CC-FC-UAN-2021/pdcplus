<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\JuddiPagamigoController;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagamigoController extends Controller
{
    public function deposito(){
        return view('pagamigo.deposito');
    }

    public function confirmarPagamento($creditar_id,$valor,$saldo,$post_id){
        return view('pagamento.inicial',['creditar_id'=>$creditar_id,'valor'=>$valor,'saldo'=>$saldo,'post_id'=>$post_id]);
        
    }

    public function concluirPagamento(Request $request){
        $soap = new JuddiPagamigoController;
        if(Hash::check($request->pass, Auth::user()->password)){
            $soap->pagarConteudo($request->valor,$request->preco,$request->creditar_id,$request->post_id);
        }
       return redirect()->route('dashboard');
    }

    public function depositoPagamigo(Request $request){
        try{
            $soap = new JuddiPagamigoController;
            $soap->deposito($request->valor);
            return redirect()->route('dashboard');
        }catch(Exception $e){
            dd("Erro a depositar");
        }
    }

    public function consutarMovimento($post_id){
        try{
            $soap = new JuddiPagamigoController;
            return $soap->consultarMovimento($post_id);
            
        }catch(Exception $e){
            dd("Erro a depositar");
        }
    } 
    
}
