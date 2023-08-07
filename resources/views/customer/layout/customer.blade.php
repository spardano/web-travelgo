<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Jasa Mulya TravelGo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/travelgo2.png') }}" rel="icon">
    <link href="{{ asset('assets/img/travelgo2.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @livewireStyles

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
    .inline-container {
        white-space: nowrap;
        /* Mencegah pemisahan baris */
    }

    .inline-container img,
    .inline-container h1 {
        display: inline-block;
        /* Menampilkan elemen dalam satu baris */
        vertical-align: middle;
        /* Mengatur posisi vertikal jika perlu */
    }
</style>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <img class="logo me-auto" src="{{ asset('assets/img/logo-travelgo2.png') }}" width="300px" alt="">

            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#jadwal">Jadwal</a></li>
                    <li><a class="nav-link scrollto" href="#about">Aplikasi</a></li>
                    <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                    <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
                    
                    
                    @if (empty(Session::get('access_token')))
                        <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login | Register</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="#" data-bs-toggle="modal" data-bs-target="#pemesananModal">Data Pemesanan</a></li>
                        <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Akun</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="inline-container">
                        <img src="{{ asset('assets/img/logojmt123.png') }}" width="80px;" height="100px;">
                        <h1 style="padding-left: 20px;">JASA MULYA TRAVEL</h1><br>
                    </div>
                    <h2 style="padding-left: 120px;">Kami Mengutamakan Pelayanan Terbaik</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ asset('/assets/img/app-debug.apk') }}" class="btn-get-started scrollto"
                            download>Get
                            App</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        @include('customer.hero-section')

        @include('customer.jadwal-section')

        @include('customer.app-section')

        @include('customer.service-section')

        @include('customer.contact-section')


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Jasa Mulya Travel</h3>
                        <p>
                            Jl. Merak No.05 D, Tangkerang Tengah <br>
                            Kec.Marpoyan Damai, Kota Pekanbaru<br>
                            Riau 28125 <br><br>
                            <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=6285219570004">085219570004</a><br>
                            <a href="#" class="gmail"><i class="bx bxl-gmail"></i></a><br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Menu Web</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Tentang</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">layanan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Kontak</a></li>
                            <li><i class="bx"></i> <a target="_blank" href="{{route('terms-condition')}}">Terms and Condition</a></li>
                         
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Layanan</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Website Travelgo</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Aplikasi TravelGO</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Antar Jemput</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Pengiriman Paket</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Pengembalian Dana</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Media Sosial Jasa Mulya Travel</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('login-customer')
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
  

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('js')

    
    @livewireScripts


</body>

</html>
