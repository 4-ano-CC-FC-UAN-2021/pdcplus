@extends('layouts.main')

@section('title', 'Deposito')
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

                        
                        <!-- widget single item end -->
                    </aside>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <!-- post status start -->
                    <div class="card">
                        <!-- post title start -->
                        <div class="post-title d-flex align-items-center">

                        </div>
                        <!-- post title start -->
                        
                        <div class="post-content">
                            <!--are do comentario-->
                            <div class="post-meta">
                                <div class="share-content-box w-100">
                                    <div class="posted-author">
                                        <h3 class="author">Saldo Disponivel: {{Crypt::decrypt($saldo)}}</h3>
                                        <br>
                                    </div>
                                    <div class="posted-author">
                                        <h3 class="author">Valor do Conteudo: {{Crypt::decrypt($valor)}}</h3>
                                        <br>    
                                    </div>
                                    @if(Crypt::decrypt($saldo) >= Crypt::decrypt($valor))
                                        <form class="share-text-box" method="POST" action="{{route('concluir.pagamento')}}">
                                            @csrf
                                            <input type="hidden" name="saldo" value="{{$saldo}}">
                                            <input type="hidden" name="preco" value="{{$valor}}">
                                            <input type="hidden" name="creditar_id" value="{{$creditar_id}}">
                                            <input type="hidden" name="post_id" value="{{$post_id}}">
                                            <input type="password" name="pass" class="share-text-field" aria-disabled="true" placeholder="Palavra - Passe"/>
                                            <button class="btn-share" type="submit">Confirmar</button>
                                        </form>
                                    @else
                                        <h3 style="color:red">Saldo Insuficiente</h3>
                                    @endif
                                </div>
                            </div>
                            
                            
                </div>
            </div>
        </div>
    </div>

</main>

@endsection