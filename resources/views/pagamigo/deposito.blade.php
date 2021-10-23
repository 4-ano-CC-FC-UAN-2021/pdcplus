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
                    

                    <!-- share box end -->
                   
                    <!-- post status start -->
                    <div class="card">
                        <div class="post-content">
                            <!--are do comentario-->
                            <div class="post-meta">
                                <div class="share-content-box w-100">
                                    <h3 aling="center">Depositar na sua conta Pagamigo</h3>
                                    <br>
                                    <form class="share-text-box" method="POST" action="{{route('concluir.deposito')}}">
                                        @csrf
                                        <input type="number" name="valor" class="share-text-field" aria-disabled="true" min="0" placeholder="Valor para deposito?"/>
                                        <button class="btn-share" type="submit">Depositar</button>
                                    </form>
                                </div>
                            </div>
                            
                            
                </div>
            </div>
        </div>
    </div>

</main>

@endsection