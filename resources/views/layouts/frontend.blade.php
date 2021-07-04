<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1e6b6f692c.js" crossorigin="anonymous"></script>
    <!-- Font Ubuntu -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Style -->
    <script src="{{asset('superadmin/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <title>@yield('title') | FL2SN 2021</title>
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo.png')}}" />
    @yield('style')
</head>

<body>
    <header class="banner">
        <nav class='navbar navbar-expand-lg navbar-dark'>
            <div class="container">
                <a class="navbar-brand" href="{{route('landing')}}">
                    <img src="{{asset('assets/images/logo.png')}}" class="logo" alt="logo light" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" />
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('landing')}}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('bidang')}}">Bidang Lomba</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('informasi')}}">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('berita')}}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('unduhan')}}">Dokumen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('faq')}}">FAQ</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Kendala
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('tiket')}}">Form Kendala</a>
                                <a class="dropdown-item" href="{{route('cek_tiket')}}">Cek Kendala</a>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link masuk" href="{{route('login')}}">Masuk</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link daftar" href="{{route('register')}}">Daftar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('header')
    </header>
    @yield('content')
    <footer>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <img src="{{asset('assets/images/puspresnas-logo.png')}}" alt="" style="width: 100%;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <p class="text-center text-white">Komplek Kementrian Pendidikan dan Kebudayaan, <br> Gedung C, Lantai 19 Jl. Jenderal Sudirman, <br> Senayan, Jakarta - 10270</p>
                    <hr style="border-top: 1px solid #fff;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="sosmed">
                        <a href="https://twitter.com/puspresnas"><i class="fab fa-facebook-square"></i> <i class="fab fa-twitter"></i> Puspresnas</a>
                        <a href="https://www.instagram.com/puspresnas/"><i class="fab fa-instagram"></i></i> puspresnas</a>
                        <a href="https://www.youtube.com/channel/UC-NYR136dYUJLsSiWRfLNKA"><i class="fab fa-youtube"></i> Pusat Prestasi Nasional</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    @yield('script')
</body>

</html>