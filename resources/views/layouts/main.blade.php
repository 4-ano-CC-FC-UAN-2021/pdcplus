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
                                    <li class="active"><a href="index.html">home</a></li>
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
                                <form class="top-search-box">
                                    <input type="text" placeholder="Procurar" class="top-search-field">
                                    <button class="top-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            <!-- header top search end -->

                            <!-- profile picture start -->
                            <div class="profile-setting-box">
                                <div class="profile-thumb-small">
                                    <a href="javascript:void(0)" class="profile-triger">
                                        <figure>
                                            <img src="assets/images/profile/profile-small-1.jpg" alt="profile picture">
                                        </figure>
                                    </a>
                                    <div class="profile-dropdown">
                                        <div class="profile-head">
                                            <h5 class="name"><a href="#">Madison Howard</a></h5>
                                            <a class="mail" href="#">mailnam@mail.com</a>
                                        </div>
                                        <div class="profile-body">
                                            <ul>
                                                <li><a href="profile.html"><i class="flaticon-user"></i>Profile</a></li>
                                                <li><a href="#"><i class="flaticon-message"></i>Inbox</a></li>
                                                <li><a href="#"><i class="flaticon-document"></i>Activity</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
                                                <li><a href="signup.html"><i class="flaticon-unlock"></i>Sing out</a></li>
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
    <!-- header area start -->
    <header>
        <div class="mobile-header-wrapper sticky d-block d-lg-none">
            <div class="mobile-header position-relative ">
                <div class="mobile-logo">
                    <a href="#">
                        <img style="width:40px" src="{{asset('img/logo/logo.png')}}" alt="brand logo">
                    </a>
                </div>
                <div class="mobile-menu w-100">
                    <ul>
                        <li>
                            <button class="notification request-trigger"><i class="flaticon-users"></i>
                                <span>03</span>
                            </button>
                            <ul class="frnd-request-list">
                                <li>
                                    <div class="frnd-request-member">
                                        <figure class="request-thumb">
                                            <a href="profile.html">
                                                <img src="assets/images/profile/profile-midle-1.jpg" alt="proflie author">
                                            </a>
                                        </figure>
                                        <div class="frnd-content">
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirm</button>
                                                <button class="frnd-btn delete">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li>
                            <button class="search-trigger">
                                <i class="search-icon flaticon-search"></i>
                                <i class="close-icon flaticon-cross-out"></i>
                            </button>
                            <div class="mob-search-box">
                                <form class="mob-search-inner">
                                    <input type="text" placeholder="Pesquise aqui..." class="mob-search-field">
                                    <button class="mob-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mobile-header-profile">
                    <!-- profile picture end -->
                    <div class="profile-thumb profile-setting-box">
                        <a href="javascript:void(0)" class="profile-triger">
                            <figure class="profile-thumb-middle">
                                <img src="assets/images/profile/profile-small-1.jpg" alt="profile picture">
                            </figure>
                        </a>
                        <div class="profile-dropdown text-left">
                            <div class="profile-head">
                                <h5 class="name"><a href="#">Madison Howard</a></h5>
                                <a class="mail" href="#">mailnam@mail.com</a>
                            </div>
                            <div class="profile-body">
                                <ul>
                                    <li><a href="profile.html"><i class="flaticon-user"></i>Profile</a></li>
                                    <li><a href="#"><i class="flaticon-message"></i>Inbox</a></li>
                                    <li><a href="#"><i class="flaticon-document"></i>Activity</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
                                    <li><a href="signup.html"><i class="flaticon-unlock"></i>Sing out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- profile picture end -->
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