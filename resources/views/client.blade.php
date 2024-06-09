<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    
    <!-- StyleSheet -->
    @vite('resources/css/app.css')
    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('cssfile/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/niceselect.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/flex-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/style.css') }}">
</head>
<body class="js">
@if(Auth::user()->type_user === 'admin')
    <a href="{{ route('admin.users') }}">users</a>
    <a href="{{ route('admin.products') }}">Products</a>
@elseif(Auth::user()->type_user === 'seller')
<header class="header shop">
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        @auth
                        <div class="sinlge-bar">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-orange-600 hover:text-orange-900">Logout</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="{{ route('products.index') }}">Ajouter Produit</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New Div for Affiliate Role Description -->
            
        </div>
    </div>
</header>
<div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="affiliate-role">
                        <h2>Rôle du Vendeur dans l'Affiliation</h2>
                        <p>En tant que vendeur affilié, vous jouez un rôle crucial en promouvant nos produits et en générant des ventes à travers vos canaux. Vous pouvez gagner des commissions attractives en partageant vos liens d'affiliation uniques et en atteignant un large public.</p>
                    </div>
                </div>
            </div>

<!-- CSS Styles -->
<style>
    .affiliate-role {
        background-color: #fff3e0;
        border: 2px solid #ffa726;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-top: 20px;
    }
    .affiliate-role h2 {
        color: #fb8c00;
        margin-bottom: 15px;
    }
    .affiliate-role p {
        color: #ef6c00;
    }
</style>

<!-- Bootstrap JS -->
<script src="{{ asset('jsfile/bootstrap.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('jsfile/popper.min.js') }}"></script>
<!-- Ajax -->
<script src="{{ asset('jsfile/jquery.ajaxchimp.min.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('jsfile/jquery.slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('jsfile/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('jsfile/jquery.magnific-popup.min.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('jsfile/waypoints.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('jsfile/nicesellect.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('jsfile/flex-slider.js') }}"></script>
@else 

    <!-- Preloader -->
    <!-- Header -->
    <header class="header shop">
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <div class="search-top">
                                <form class="search-form">
                                    <input type="text" placeholder="Search here..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <form>
                                    <input name="search" placeholder="Search Products Here....." type="search">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                        @auth
                        <div class="sinlge-bar">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-orange-600 hover:text-orange-900">Logout</button>
                            </form>
                        </div>
                        @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li class="active"><a href="#">Home</a></li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>On Sale</h1>
                            </div>
                        </div>
                    </div>
                    @foreach($data as $product)
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img class="w-8" src="{{ asset('uploads/photos/'.$product->image1) }}" alt="">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h4 class="title"><a href="#">{{ $product->name }}</a></h4>
                                    <p class="price with-discount">${{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="{{ asset('jsfile/bootstrap.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('jsfile/popper.min.js') }}"></script>
    <!-- Ajax -->
    <script src="{{ asset('jsfile/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('jsfile/jquery.slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('jsfile/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('jsfile/jquery.magnific-popup.min.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('jsfile/waypoints.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('jsfile/nicesellect.js') }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ asset('jsfile/flex-slider.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('jsfile/scrollup.js') }}"></script>
    <!-- One Page Nav JS -->
    <script src="{{ asset('jsfile/onepage-nav.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('jsfile/easing.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('jsfile/active.js') }}"></script>


    @endif
    <!-- Scroll
