@extends('layouts.main')

@section('title', 'Pagina Inicial')
@section('content')
    
<main>

    <div class="main-wrapper pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="widget-area">
                        <!-- widget single item start -->
                        <div class="card card-profile widget-item p-0">
                            <div class="profile-banner">
                                <figure class="profile-banner-small">
                                    <a href="profile.html">
                                        <img src="assets/images/banner/banner-small.jpg" alt="">
                                    </a>
                                    <a href="profile.html" class="profile-thumb-2">
                                        <img src="assets/images/profile/profile-midle-1.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="profile-desc text-center">
                                    <h6 class="author"><a href="profile.html">{{Auth::user()->name}}</a></h6>
                                    <p>            
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- widget single item start -->

                        <!-- widget single item start -->
                        <div class="card widget-item">
                            <h4 class="widget-title">Pedidos de Ligações</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper">
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="frnd-content">
                                            @if (!$pedidos)
                                                <p class="author-subtitle">Sem pedidos de amizade novos</p>
                                            @else
                                                @foreach ($pedidos as $pedido)
                                                    <h6 class="author"><a href="#perfil"></a></h6>
                                                    <p class="author-subtitle">{{$pedido->name." - @".$pedido->username}}</p>

                                                    <div class="request-btn-inner">
                                                        @if ($pedido->estado == 2)
                                                            <div class="request-btn-inner">
                                                                <a href="{{route('confirmar.amigo', Crypt::encryptString($pedido->id))}}" class="frnd-btn">confirmar</a>
                                                                <a href="{{route('cancelar.amigo', Crypt::encryptString($pedido->id))}}" class="frnd-btn delete">ignorar</a>
                                                            </div>
                                                        @elseif($pedido->estado == 1)
                                                            <div class="request-btn-inner">
                                                                <h6>Amigos</h6>
                                                            </div>
                                                        @elseif($pedido->estado == -1)
                                                            <div class="request-btn-inner">
                                                                <a href="{{route('add.amigo', Crypt::encryptString($pedido->id))}}" class="frnd-btn">Adicionar</a>
                                                            </div>
                                                        @else
                                                            <div class="request-btn-inner">
                                                                <p>Solicitação Feita</p>
                                                                <a href="{{route('cancelar.amigo', Crypt::encryptString($pedido->id))}}" class="frnd-btn delete">Cancelar</a>
                                                            </div>
                                                        @endif
                
                                                @endforeach
                                                
                                            @endif
                                            
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->

                        
                        <!-- widget single item end -->
                    </aside>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <!-- share box start -->
                    <div class="card card-small">
                        <div class="share-box-inner">
                            <!-- profile picture end -->
                            <div class="profile-thumb">
                                <a href="#">
                                    <figure class="profile-thumb-middle">
                                        <img src="{{asset('images/profile/avatar.jpg')}}" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <!-- share content box start -->
                            <form class="share-text-box" method="POST" action="{{route('cadastrar.post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="share-content-box w-100">
                                    
                                        <textarea name="share" class="share-text-field" aria-disabled="true" placeholder="O que está pensando..." data-toggle="modal" data-target="#textbox" id="email"></textarea>
                                        <button class="btn-share" type="submit">Publicar</button>
                                    
                                </div>
                                <!-- share content box end -->

                                <!-- Modal start -->
                                <div class="modal fade" id="textbox" aria-labelledby="textbox">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h5 class="modal-title">O que está pensando...</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body custom-scroll">
                                                <textarea name="legenda" class="share-field-big custom-scroll" placeholder="Acho que..."></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="custom-file">
                                                    <input type="file" name="ficheiro" class="post-share-btn custom-file-input " id="customFileLang">
                                                    <label class="custom-file-label" for="customFileLang"></label>
                                                </div>
                                                <select name="tipo" style="background-color:black" class="post-share-btn">
                                                    <option value="desprotegida">Desprotegida</option>
                                                    <option value="protegida">Protegida</option>
                                                </select>
                                                
                                                <select name="autorizacao" style="background-color:black" class="post-share-btn">
                                                    <!--Aqui busca todas modalidades para publicaoes e apresenta como opcões-->
                                                    @foreach ($autorizacoes as $autorizacao)
                                                        <option  value="{{ $autorizacao->id }}">{{ $autorizacao->descricao }}</option>    
                                                    @endforeach
                                                </select>
                                                <button type="button" class="post-share-btn" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="post-share-btn">Publicar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <!-- Modal end -->
                            </form>
                        </div>
                    </div>
                    
                    <!-- share box end -->
                    @foreach ($posts as $post)

                    <!-- post status start -->
                    <div class="card">
                        <!-- post title start -->
                        <div class="post-title d-flex align-items-center">
                            <!-- profile picture end -->
                            <div class="profile-thumb">
                                <a href="#">
                                    <figure class="profile-thumb-middle">
                                        <img src="{{asset('images/profile/avatar.jpg')}}" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <div class="posted-author">
                                <h6 class="author"><a href="#">{{($post->uid == Auth::user()->id)?"Eu":$post->name}}</a></h6>
                                <span class="post-time">{{$post->updated_at}}</span>
                            </div>
                        </div>
                        <!-- post title start -->
                        
                        <div class="post-content">
                            <p class="post-desc">
                                {{$post->legenda}}
                            </p>
                            @if(isset($post->file))
                                @if($post->uid == Auth::user()->id)
                                    <a href="{{asset("tmp/".$post->file)}}">Baixar Conteudo </a>
                                @elseif($post->preco == 0)
                                    <a href="{{asset("tmp/".$post->file)}}">Baixar Conteudo </a>
                                @else
                                    <a href="{{route("pagar.conteudo",['creditar_id'=>Crypt::encrypt($post->uid),'valor'=>Crypt::encrypt($post->preco),'saldo'=>Crypt::encrypt($saldo->return),'post_id'=>Crypt::encrypt($post->id)])}}">Pagar Pelo Conteudo </a>
                                @endif
                            @endif
                            <div class="post-meta">
                                <button class="post-meta-like">
                                    <i class="bi bi-heart-beat"></i>
                                    <span>0</span>
                                </button>
                                <ul class="comment-share-meta">
                                    <li>
                                        <button class="post-comment">
                                            <i class="bi bi-chat-bubble"></i>
                                            <span>{{$post->qtd_comentarios}}</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <!--are do comentario-->
                            <div class="post-meta">
                                <div class="share-content-box w-100">
                                    <form class="share-text-box" method="POST" action="{{route('comentar')}}">
                                        @csrf
                                        <textarea name="comentario" class="share-text-field" aria-disabled="true" placeholder="O que achaste?"></textarea>
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <button class="btn-share" type="submit">Comentar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- post status end -->


                   
                </div>

                <div class="col-lg-3 order-3">
                    <aside class="widget-area">
                        <!-- widget single item start -->
                        <div class="card widget-item">
                            <h4 class="widget-title">Saldo na Conta Pagamigo</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper">
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        
                                        <div class="unorder-list-info">
                                            <h3 class="list-title">{{$saldo->return}}</h3>
                                            <p class="list-subtitle">Valor em Kwanzas</p>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->

                        
                        
                    </aside>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection