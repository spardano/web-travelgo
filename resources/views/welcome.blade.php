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
                    <li><a class="nav-link scrollto" href="#about">Aplikasi</a></li>
                    <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                    <li><a class="nav-link scrollto" href="#jadwal">Jadwal</a></li>
                    <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
                    <li><a class="getstarted scrollto" href="{{ url('admin') }}">Admin Login</a></li>
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

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/Pekanbaru.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/Dumai.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/Bengkalis.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/Rengat2.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/Padang.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/Dharmasraya.png') }}" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <section id="jadwal" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Jadwal Keberangkatan</h2>
                    <p>Temukan jadwal keberangkatan, kota penjemputan, kota pengantaran yang sesuai dengan kebutuhanmu
                    </p>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    @foreach ($data_baru as $item)
                        <div class="col-md-6  align-items-stretch mt-4" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <h4>
                                            @php
                                                // Menggunakan Carbon untuk memanipulasi tanggal_berangkat
                                                $tanggalBerangkat = \Illuminate\Support\Carbon::parse($item['tanggal_berangkat']);
                                                $waktuBerangkat = \Illuminate\Support\Carbon::parse($item['waktu_berangkat']);
                                            @endphp
                                            <a href="">{{ $tanggalBerangkat->format('d M Y') }}</a>
                                        </h4>
                                        <h5 style="text-transform: uppercase">{{ $item['nama_trayek'] }}</h5>
                                        <h3>Harga: Rp.{{ number_format($item['harga']) }}</h3>
                                    </div>
                                    <div class="col-xl-4">
                                        <h5>Angkutan: {{ $item['nama_angkutan'] }}</h5>
                                        <h5>{{ $item['kelas'] }}</h5>
                                        <h5>Berangkat : {{ $waktuBerangkat->format('H:i') }}</h5>
                                    </div>
                                    <div class="col-xl-4">
                                        <h5>Tiket Tersedia:</h5>
                                        <h1>{{ $item['tiket_tersedia'] }}</h1>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </section>
        

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Aplikasi Travelgo</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-12 text-center">

                        <img src="{{ asset('assets/img/travelgo.png') }}" width="800px" alt="">

                        <div class="desc-app" style="margin-top:80px; margin-bottom:30px">
                            <h2
                                style="font-weight: 700;
                            color: #515769;
                            line-height: 1.4;
                            margin: 0 0 15px;">
                                Aplikasi Pembelian Tiket TravelGO</h2>

                            <p
                                style="font-size: 15px;
                            font-weight: 400;
                            color: #a6a7aa;
                            margin-bottom: 15px; width:40%; margin:0 auto;">
                                Dengan Menggunakan aplikasi Travelgo, kamu bisa membeli tiket sesuai dengan jadwal yang
                                kamu mau. pembayaran lebih mudah dengan metode <b>Online Payment
                                </b> </p>
                        </div>
                        {{-- <a href="{{ asset('/assets/img/app-debug.apk') }}" class="btn btn-outline-info"
                            download>Install APK</a> --}}

                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Layanan Kami</h2>
                    <p>Dalam Memberikan Kenyamanan dan pengalaman terbaik kami menyidiakan beberapa layanan</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">App Travel GO</a></h4>
                            <p>Kami menyediakan layanan pembelian tiket travel dengan menggunakan aplikasi agar dapat
                                mempermudah anda dalam mencari dan melakukan pemesanan tiket travel kami</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Antar Jemput</a></h4>
                            <p>Layanan antar jemput hanya melayani area kerja atau jaraj terjauh 5 km dari pusat kota
                                keberangkatan atau tujuan.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Pengiriman Paket/Document</a></h4>
                            <p>Pengiriman paket tidak tersedia di aplikasi dan tidak mendapat layanan antar jemput,
                                setiap paket yang akan
                                dikirim harus diantar kealamat loket kami yang ada di kota anda,</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a href="">Asuransi</a></h4>
                            <p>Setiap pembelian tiket travel kami sudah termasuk asuransi jasa raharja</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        


        <!-- ======= Team Section ======= -->
        <section id="kontak" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                    <p>Agar mempermudah anda dalam mendapat kan informasi yang lebih detail tentang Jasa Mulya Travel
                        kami menyediakan kontak yang
                        dapat anda hubungi</p>
                </div>

                <div class="row">

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('assets/img/team/team-1.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Resdal</h4>
                                <span>Pekanbaru</span>
                                <a href="https://api.whatsapp.com/send?phone=6285219570004">
                                    <p><i class="bi bi-whatsapp"></i> 085219570004</p>
                                </a>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('assets/img/team/team-2.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Ridho</h4>
                                <span>Admin Padang</span>
                                <a href="https://api.whatsapp.com/send?phone=082391559288">
                                    <p><i class="bi bi-whatsapp"></i> 082391559288</p>
                                </a>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('assets/img/team/team-3.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>Admin Dumai</span>
                                <a href="https://api.whatsapp.com/send?phone=6285219570004">
                                    <p><i class="bi bi-whatsapp"></i> 085219570004</p>
                                </a>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('assets/img/team/team-4.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Admin Rengat</span>
                                <a href="https://api.whatsapp.com/send?phone=6285219570004">
                                    <p><i class="bi bi-whatsapp"></i> 085219570004</p>
                                </a>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Team Section -->


        <!-- ======= Pricing Section ======= -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Alamat</h2>
                    <p>Untuk Pembelian Tiket Secara Manual atau datang lansung keloket dapat mendatangi alamat dibawah
                    </p>
                </div>

                <div class="row">

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi:</h4>
                                <p>Jl. Merak No.05 D, Tangkerang Tengah, Kec.Marpoyan Damai, Kota Pekanbaru, Riau 28125
                                </p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <a href="https://api.whatsapp.com/send?phone=6285219570004">
                                    <p>085219570004</p>
                                </a>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12121.333330927442!2d101.4488938!3d0.4896646!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aec4f76db6f9%3A0xe82078220f57ecc2!2sJASA+MULYA+Travel+Pekanbaru+Duri+Dumai!5e0!3m2!1sid!2sid!4v1625734820766"
                                frameborder="0" style="border:0; width: 100%; height: 290px;"
                                allowfullscreen></iframe>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

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

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
