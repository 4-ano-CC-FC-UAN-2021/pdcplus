<!doctype html>
<html class="no-js" lang="{{str_replace('_','-',app()->getLocale())}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/bicon.min.css')}}">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/flaticon.css')}}">
    <!-- audio & video player CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/plyr.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/slick.min.css')}}">
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/nice-select.css')}}">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="{{asset('css/plugins/perfect-scrollbar.css')}}">
    <!-- light gallery css -->
    <link rel="stylesheet" href="{{asset('css/plugins/lightgallery.min.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>

    <!-- header area start -->
    <header>
        <div class="header-top sticky bg-white d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <!-- header top navigation start -->
                        <div class="header-top-navigation">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{route('dashboard')}}">home</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- header top navigation start -->
                    </div>

                    <div class="col-md-2">
                        <!-- brand logo start -->
                        <div class="brand-logo text-center">
                            <a href="#">
                                <img style="width:40px" src="{{asset('img/logo/logo.png')}}" alt="brand logo">
                            </a>
                        </div>
                        <!-- brand logo end -->
                    </div>

                    <div class="col-md-5">
                        <div class="header-top-right d-flex align-items-center justify-content-end">
                            <!-- header top search start -->
                            <div class="header-top-search">
                                <form method="POST" action="{{route('search')}}" class="top-search-box">
                                    @csrf
                                    <input name="busca" type="text" placeholder="Procurar" class="top-search-field">
                                    <button class="top-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            <!-- header top search end -->

                            <!-- profile picture start -->
                            <div class="profile-setting-box">
                                <div class="profile-thumb-small">
                                    <a href="javascript:void(0)" class="profile-triger">
                                        <figure>
                                            <img src="{{asset('images/profile/avatar.jpg')}}" alt="profile picture">
                                        </figure>
                                    </a>
                                    <div class="profile-dropdown">
                                        <div class="profile-head">
                                            <h5 class="name"><a href="#">{{Auth::user()->name}}</a></h5>
                                            <a class="mail" href="#">{{Auth::user()->email}}</a>
                                        </div>
                                        <div class="profile-body">
                                            <ul>  
                                                <li><a href="{{route('create.deposito')}}"><i class="flaticon-settings"></i>Depositar</a></li>
                                                <li><a href="{{route('sair')}}"><i class="flaticon-unlock"></i>Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- profile picture end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    
    
    <!--Main-->
    @yield('content')

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
    <!-- Scroll to Top End -->



    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{asset('js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{asset('js/vendor/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
    <!-- Slick Slider JS -->
    <script src="{{asset('js/plugins/slick.min.js')}}"></script>
    <!-- nice select JS -->
    <script src="{{asset('js/plugins/nice-select.min.js')}}"></script>
    <!-- audio video player JS -->
    <script src="{{asset('js/plugins/plyr.min.js')}}"></script>
    <!-- perfect scrollbar js -->
    <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
    <!-- light gallery js -->
    <script src="{{asset('js/plugins/lightgallery-all.min.js')}}"></script>
    <!-- image loaded js -->
    <script src="{{asset('js/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <!-- isotope filter js -->
    <script src="{{asset('js/plugins/isotope.pkgd.min.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>