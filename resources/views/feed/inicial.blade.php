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
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirmar</button>
                                                <button class="frnd-btn delete">ignorar</button>
                                            </div>
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
                                        <img src="assets/images/profile/profile-small-37.jpg" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <!-- share content box start -->
                            <form class="share-text-box" method="POST" action="{{route('cadastrar.post')}}">
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
                                                    <input type="file" class="post-share-btn custom-file-input " id="customFileLang">
                                                    <label class="custom-file-label" for="customFileLang"></label>
                                                </div>
                                                <select name="tipo" style="background-color:black" class="post-share-btn">
                                                    <option value="protegida">Protegida</option>
                                                    <option value="desprotegida">Desprotegida</option>
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
                                        <img src="assets/images/profile/profile-small-1.jpg" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <div class="posted-author">
                                <h6 class="author"><a href="profile.html">Eu</a></h6>
                                <span class="post-time">{{$post->updated_at}}</span>
                            </div>
                        </div>
                        <!-- post title start -->
                        
                        <div class="post-content">
                            <p class="post-desc">
                                {{$post->legenda}}
                            </p>
                            <div class="post-meta">
                                <button class="post-meta-like">
                                    <i class="bi bi-heart-beat"></i>
                                    <span>41</span>
                                </button>
                                <ul class="comment-share-meta">
                                    <li>
                                        <button class="post-comment">
                                            <i class="bi bi-chat-bubble"></i>
                                            <span>41</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <!--are do comentario-->
                            <div class="post-meta">
                                <div class="share-content-box w-100">
                                    <form class="share-text-box">
                                        <textarea name="share" class="share-text-field" aria-disabled="true" placeholder="O que achaste?"></textarea>
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
                            <h4 class="widget-title">Actividades Recentes</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper">
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-9.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                            <p class="list-subtitle">5 min ago</p>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->

                        
                        <!-- widget single item start -->
                        <div class="card widget-item">
                            <h4 class="widget-title">Sugestão de Amizades</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper">
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-33.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Ammeya Jakson</a></h3>
                                            <p class="list-subtitle"><a href="#">10 mutual</a></p>
                                        </div>
                                        <button class="like-button">
                                            <img class="heart" src="assets/images/icons/heart.png" alt="">
                                            <img class="heart-color" src="assets/images/icons/heart-color.png" alt="">
                                        </button>
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