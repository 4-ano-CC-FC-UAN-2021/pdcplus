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

                        
                        
                        <!-- widget single item end -->
                    </aside>
                </div>

                <div class="col-lg-4 order-1 order-lg-2">
             
                    @if (empty($results))
                        <h1>SEM RESULTADOS...</h1>
                    @endif
                    @foreach ($results as $result)
                    
                        @if ($result->username != Auth::user()->username)
                        
                    
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
                                            <p class="post-desc">
                                                {{$result->name}} - {{"@".$result->username}}
                                            </p>
                                        </a>
                                        
                                    </div>
                                    <!-- profile picture end -->

                                </div>
                                <!-- post title start -->
                                
                                <div class="post-content">
                                    <p class="post-desc">
                                        {{$result->email}}
                                    </p>
                                    <div class="request-btn-inner">
                                        @if ($result->estado == 2)
                                            <div class="request-btn-inner">
                                                <a href="{{route('confirmar.amigo', Crypt::encryptString($result->id))}}" class="frnd-btn">confirmar</a>
                                                <a href="{{route('cancelar.amigo', Crypt::encryptString($result->id))}}" class="frnd-btn">ignorar</a>
                                            </div>
                                        @elseif($result->estado == 1)
                                            <div class="request-btn-inner">
                                                <h6>Amigos</h6>
                                            </div>
                                        @elseif($result->estado == -1)
                                            <div class="request-btn-inner">
                                                <a href="{{route('add.amigo', Crypt::encryptString($result->id))}}" class="frnd-btn">Adicionar</a>
                                            </div>
                                        @else
                                            <div class="request-btn-inner">
                                                <p>Solicita????o Feita</p>
                                                <a href="{{route('cancelar.amigo', Crypt::encryptString($result->id))}}" class="frnd-btn">Cancelar</a>
                                            </div>
                                        @endif


                                        
                                        <!--<button class="frnd-btn delete">ignorar</button>-->
                                    </div>
                                    
                                </div>
                            </div>
                            @endif
                        @endforeach
                    
                    <!-- post status end -->
                </div>

                
                    

</main>

@endsection