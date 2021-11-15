<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Autorizacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FtpController;
use App\Http\Controllers\PagamigoController;
use Exception;
use Illuminate\Support\Facades\Crypt;

class PostController extends Controller
{
    public function create(){
        return view('feed.inicial',['autorizacoes' => Autorizacao::all(), 'posts' => DB::table('posts')->orderBy('updated_at', 'desc')->get()]);
    }

    public function conteudoPreco($pub){
        return view('conteudo.preco',['pub' => $pub]);
    }

    public function store(StorePostRequest $request){
        $pedidos = new AmigoController;
        $soap = new LargaCaixaController;
        $ftp = new FtpController;
        try{
            $a = $request->validated();
            $post = new Post;
            $post->legenda = $request->legenda;
            $post->tipo = $request->tipo;
            $post->autorizacao_id = $request->autorizacao;
            $post->user_id = Auth::user()->id;
            $post->save();
            if($request->ficheiro){
                $ficheiro = $ftp->envioFicheiro($request->file('ficheiro'));
                $soap->guardarPost($post->id,$ficheiro,$request->ficheiro->getClientOriginalExtension(),0);
                return redirect()->route('definir.preco',['pub' => Crypt::encrypt($post->id)]);
            }
            return redirect()->route('dashboard');    
        }catch(Exception $e){
            dd("Erro inesperado");
        }    
        
        return redirect()->route('dashboard');   
    }

    public function definirPrecoConteudo(Request $request){
        $soap = new LargaCaixaController;
        try{
            if($soap->actualizarPreco($request->preco,$request->pub)){
                return redirect()->route('dashboard');
            }
            dd("erro");
        }catch(Exception $e){
            dd("Erro Desconhecido");
        }
        
    }

    public function publicacoes(){
        $soap = new LargaCaixaController;
        $pagaAmigo = new PagamigoController;
        $comentario = new ComentarioController;
        $like = new LikeController;
        $user = Auth::user()->id;
        $posts = DB::select( DB::raw("SELECT users.id as uid, users.name,users.username,posts.* FROM `posts`,users WHERE posts.tipo = 'desprotegida' and (posts.autorizacao_id = 1 or posts.autorizacao_id = 2) and (posts.user_id in (SELECT user_id_send from amigos where user_id_receive=$user and estado=1) or posts.user_id in (SELECT user_id_receive from amigos where user_id_send=$user and estado=1) or posts.user_id=$user) and users.id = posts.user_id ORDER by updated_at desc;"));
        //SELECT * FROM `posts` WHERE (autorizacao_id = 1 or autorizacao_id = 2) and (user_id in (SELECT user_id_send from amigos where user_id_receive=1 and estado=1) or user_id in (SELECT user_id_receive from amigos where user_id_send=1 and estado=1) or user_id=1) ORDER by updated_at desc;
        $publicacoes =  array();
        foreach ($posts as $post) {
            //likes
            $post->likes = $like->countLikes($post->id);
            $post->unlikes = $like->countUnlikes($post->id);
            $post->isClassificao = $like->isClassificao($post->id);

            $post->qtd_comentarios = $comentario->countComenterios($post->id);
            $isFile = (object) $soap->consultarConteuto($post->id);
            $pagamento = (object) $pagaAmigo->consutarMovimento($post->id);
            
            if(isset($isFile->return)){
                $post->file = $isFile->return->descricao;
                $post->preco = $isFile->return->preco;
                $post->pagamento = $pagamento->return;
            }
            array_push($publicacoes,$post);
        }
        
        $publicacoes = (object) $publicacoes;

        return $publicacoes;
    }
}
