<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front')}}/assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front')}}/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front')}}/assets/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="icon" type="image/x-icon" href="{{asset('front')}}/assets/favicon.ico" />
    <title>@yield('title','Anasayfa | Barış Akar')</title>









    <!--   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">  -->

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Diplomata&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('front')}}/css/styles.css" rel="stylesheet" />
</head>

<body style="background-color: #909294;">
    <!-- Navigation-->
    <nav style="background-color: transparent" class="navbar navbar-expand-lg navbar-secondary" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a style="font-family: 'Prata', serif; font-size: 30px" class="navbar-brand"
                href="{{route('homepage')}}">AKAR</a>
            <button style="color: black" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">

                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('homepage')}}">Anasayfa</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="#kategori">Kategoriler</a>
                    </li>

                        @foreach ($pages as $page)
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('page',$page->slug)}}">{{$page->title}}</a>
                        </li>
                        @endforeach


                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('contact')}}">İletişim</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{asset('front')}}/assets/img/home-bg3.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">

            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">