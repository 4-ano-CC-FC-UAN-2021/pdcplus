@extends('layouts.main')

@section('title', 'Comentarios')
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
                                <span class="post-time"></span>
                            </div>
                        </div>
                        <!-- post title start -->
                        
                        <div class="post-content">
                            <p class="post-desc">
                               {{$posts->legenda}}
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
                                    <form class="share-text-box" method="POST" action="{{route('comentar')}}">
                                        @csrf
                                        <textarea name="comentario" class="share-text-field" aria-disabled="true" placeholder="O que achaste?"></textarea>
                                        <input type="hidden" name="post_id" value="{{$posts->id}}">
                                        <button class="btn-share" type="submit">Comentar</button>
                                    </form>
                                </div>
                            </div>
                            @foreach ($comentarios as $comentario)    
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
                                        <br>
                                        <h6 class="author"><a href="profile.html">Eu</a></h6>
                                        <span class="post-time"></span>
                                        <p class="post-desc">
                                            {{$comentario->comentario}}
                                        </p>
                                    </div>
                                    
                                
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- post status end -->
                </div>
            </div>
        </div>
    </div>

</main>

@endsection