<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Periksain - Software Landing Page">
        <meta name="author" content="KeyDesign" />
        <!-- SITE TITLE -->
        <title>Periksa.in</title>
        <!-- STYLESHEETS -->
        <link href="{{ URL::asset('softkey_assets/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('softkey_assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('softkey_assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('softkey_assets/css/responsive.css') }}" rel="stylesheet">
        <!-- DEMO COLORS  -->
        <link href="#" class="css-color" rel="stylesheet">

        <!-- FAVICON  -->
        <link rel="icon" href="softkey_assets/img/favicon.ico">
    </head>
    <body>
        <!-- PRELOADER -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- MAIN NAV -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- MAIN NAV LOGO -->
                    <a href="/" class="logo-text"><h3 style="margin-top: 10px; color: white; font-weight: 700;">Periksa.in</h3></a>
                </div>
                <div class="collapse navbar-collapse" id="main-menu">
                    <!-- MAIN NAV LINKS -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="#header">Periksa Rekening/Telepon</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#statistik">Statistik</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/akun/laporkan/">Laporkan Penipuan</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/akun/sanggahan/">Sanggahan</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/akun/masuk">Login</a>
                        </li>
                    </ul>
                    <!-- END MAIN NAV LINKS -->
                </div>
            </div>
        </nav>
        <!-- END MAIN NAV -->
        <!-- HEADER -->
        <header id="header">
            <div class="container">
                <div class="intro-text">
                    <h1 class="intro-lead-in">Periksain, cek sebelum bertindak</h1>
                    <span class="intro-heading">Mengidentifikasi apakah nomor rekening/telepon seseorang pernah terindikasi penipuan</span>
                    <div id="subscribe" class="header-buttons">
                        <form class="subscribe-form" method="POST" action="{{route('post_cek')}}">
                            @csrf
                            <input type="text" id="nomor" name="nomor" placeholder="Nomor telepon/rekening"/>
                            <button type="submit">Periksa</button>
                            <div id="subscribe-success"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="particles-js"></div>
        </header>
        <!-- END HEADER -->
        <!-- SERVICES -->
        <section id="statistik">
            <div class="container">
                <div class="row">
                    <!-- SERVICES HEADING -->
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Statistik</h2>
                        <span class="separator"></span>
                        <p class="section-subheading ">Lorem ipsum dolor sit amet.</p>
                    </div>
                    <!-- END SERVICES HEADING -->
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <i class="nc-icon-outline wallet"></i>
                        <br><br>
                        <h4 class="service-heading">189484+</h4>
                        <p class="">Kasus Penipuan Dilaporkan</p>
                    </div>
                    <div class="col-md-3">
                        <i class="nc-icon-outline wallet"></i>
                        <br><br>
                        <h4 class="service-heading">189484+</h4>
                        <p class="">Rekening Dilaporkan</p>
                    </div>
                    <div class="col-md-3">
                        <i class="nc-icon-outline wallet"></i>
                        <br><br>
                        <h4 class="service-heading">189484+</h4>
                        <p class="">Nomor Telepon Dilaporkan</p>
                    </div>
                    <div class="col-md-3 last">
                        <i class="nc-icon-outline pc"></i>
                        <br><br>
                        <h4 class="service-heading">2 Juta</h4>
                        <p class="">Total Kerugian</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SERVICES -->
        <!-- FEATURES -->

        <!-- END FEATURES -->
        <!-- VIDEO -->

        <!-- VIDEO POPUP -->

        <!-- END VIDEO POPUP -->
        <!-- END VIDEO -->
        <!-- SOLUTIONS -->

        <!-- END SOLUTIONS -->
        <!-- PRICING TABLES -->

        <!-- PRICING TABLES -->
        <!-- TESTIMONIALS -->
        <section id="testimonials" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="slider">
                        <!-- TESTIMONIALS 1 -->
                        <div class="tt-content">
                            <h3><span class="tt-quote">“</span><span class="tt-quote tt-quote-right">”</span>Periksain is really helping all of us to make collaboration a differentiating factor to win is really helping all of us.</h3>
                            <div class="tt-container">
                                <h4 >Antony Casalena</h4>
                                <span class="content">Vice president, IQTeam</span>
                            </div>
                        </div>
                        <!-- TESTIMONIALS 2 -->
                        <div class="tt-content">
                            <h3 ><span class="tt-quote">“</span><span class="tt-quote tt-quote-right">”</span>Periksain is really helping all of us to make collaboration a differentiating factor to win is really helping all of us.</h3>
                            <div class="tt-container">
                                <h4 >Antony Casalena</h4>
                                <span class="content">Vice president, IQTeam</span>
                            </div>
                        </div>
                        <!-- TESTIMONIALS 3 -->
                        <div class="tt-content">
                            <h3 ><span class="tt-quote">“</span><span class="tt-quote tt-quote-right">”</span>Periksain is really helping all of us to make collaboration a differentiating factor to win is really helping all of us.</h3>
                            <div class="tt-container">
                                <h4 >Antony Casalena</h4>
                                <span class="content">Vice president, IQTeam</span>
                            </div>
                        </div>
                    </div>
                    <!-- TESTIMONIALS IMAGE CAPTIONS -->
                    <!-- <div class="tt-images">
                        <div class="tt-image"><img width="80" height="80" src="softkey_assets/img/testimonials/testimonial1.png" alt="team"></div>
                        <div class="tt-image"><img width="80" height="80" src="softkey_assets/img/testimonials/testimonial2.png" alt="team"></div>
                        <div class="tt-image"><img width="80" height="80" src="softkey_assets/img/testimonials/testimonial3.png" alt="team"></div>
                    </div> -->
                    <!-- END TESTIMONIALS IMAGE CAPTIONS -->
                </div>
            </div>
        </section>
        <!-- END TESTIMONIALS -->
        <!-- TEAM -->
        <section id="team">
            <div class="container">
                <div class="row">
                    <!-- TEAM HEADING -->
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Tim Kami</h2>
                        <span class="separator"></span>
                        <p class="section-subheading ">Our team maintains an effective mix of development experience and seasoned leadership.</p>
                    </div>
                    <!-- END TEAM HEADING -->  
                </div>
                <div class="row outer-margin">
                    <!-- TEAM 1 -->
                    <div class="col-md-4 team-wrapper">
                        <div class="row team-member">
                            <img src="softkey_assets/img/team/team1.jpg" alt="">
                            <div class="team-socials">
                                <a href="#"><span class="fa fa-facebook"></span></a>
                                <a href="#"><span class="fa fa-twitter"></span></a>
                                <a href="#"><span class="fa fa-linkedin"></span></a>
                            </div>
                            <div class="team-content">
                                <h5>Jerry Mack</h5>
                                <span class="team-subtitle">Web Developer</span>
                                <p>He enjoys the finer details of a project, considering every stage of his.</p>
                                <span class="triangle"></span>
                            </div>
                        </div>
                    </div>
                    <!-- TEAM 2 -->
                    <div class="col-md-4 team-wrapper">
                        <div class="row team-member team-member-down">
                            <div class="team-content">
                                <h5>Anna Shaw</h5>
                                <span class="team-subtitle">Project Manager</span>
                                <p>He enjoys the finer details of a project, considering every stage of her.</p>
                                <span class="triangle"></span>
                            </div>
                            <div class="team-socials">
                                <a href="#"><span class="fa fa-facebook"></span></a>
                                <a href="#"><span class="fa fa-twitter"></span></a>
                                <a href="#"><span class="fa fa-linkedin"></span></a>
                            </div>
                            <img src="softkey_assets/img/team/team2.jpg" alt="">
                        </div>
                    </div>
                    <!-- TEAM 3 -->
                    <div class="col-md-4 team-wrapper">
                        <div class="row team-member">
                            <img src="softkey_assets/img/team/team3.jpg" alt="">
                            <div class="team-socials">
                                <a href="#"><span class="fa fa-facebook"></span></a>
                                <a href="#"><span class="fa fa-twitter"></span></a>
                                <a href="#"><span class="fa fa-linkedin"></span></a>
                            </div>
                            <div class="team-content">
                                <h5>Leon Thompson</h5>
                                <span class="team-subtitle">UX Designer</span>
                                <p>She enjoys the finer details of a project, considering every stage of her.</p>
                                <span class="triangle"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END TEAM -->
        <!-- CLIENTS -->

        <!-- END CLIENTS -->
        {{-- <!-- SUBSCRIBE -->
        <section id="subscribe" class="parallax">
            <div class="container">
                <div class="row">
                    <h3>Subscribe to receive free updates!</h3>
                    <form class="subscribe-form">
                        <input type="email"  placeholder="Your email adress"/>
                        <button type="submit">Subscribe</button>
                        <div id="subscribe-success"></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- END SUBSCRIBE --> --}}
        <!-- CONTACT -->
        <!-- END CONTACT -->
        <!-- FOOTER -->
        <footer>
            <div class="container">
                <div class="row">
                    <!-- UPPER FOOTER -->
                    <div class="upper-footer">
                        <div class="pull-left">
                            <a href="/" class="logo page-scroll">
                                <h3 style="color: white; font-weight: 700; text-align: left;">Periksa.in</h3>
                            </a>
                            <p>Cek sebelum bertindak. Periksa nomor rekening dan nomor telepon untuk menghindari kejahatan.</p>
                        </div>
                        <div class="pull-right" style="width: auto">
                            <ul class="footer-nav">
                                <li class="">
                                    <a class="page-scroll" href="#header">Periksa</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="/akun/laporkan/bank">Laporkan Nomor Rekening</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="#statistik">Statistik</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="/akun/laporkan/telepon">Laporkan Nomor Telepon</a>
                                </li>
                                <li class="active">
                                    <a class="page-scroll" href="/akun/sanggahan/">Sanggah Laporan</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="/akun/laporan/riwayat">Riwayat Laporan</a>
                                </li>
                            </ul>
                            {{-- <ul class="footer-secondary-nav">
                                <li class="">
                                    <a class="page-scroll" href="#"><span class="fa fa-phone"></span>+44-12-3456-7890</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="#"><span class="fa fa-envelope"></span>office@Periksain</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="#"><span class="fa fa-map-marker"></span>Glen Road, E13 8 New York</a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                    <!-- END UPPER FOOTER -->
                    <!-- LOWER FOOTER -->
                    <div class="lower-footer">
                        <div class="pull-left">
                            <span>2021 © Periksa.in </span>
                            <a href="#"> Terms of Service </a>
                            <a href="#"> Privacy Policy </a>
                        </div>
                        {{-- <div class="pull-right">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-linkedin"></span></a>
                            <a href="#"><span class="fa fa-youtube"></span></a>
                            <a href="#"><span class="fa fa-pinterest"></span></a>
                            <a href="#"><span class="fa fa-skype"></span></a>
                        </div> --}}
                    </div>
                    <!-- END LOWER FOOTER -->
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->
        <!-- SCRIPTS -->
        <!-- jQuery & Bootstrap -->
        <script src="softkey_assets/js/jquery.js"></script>
        <script src="softkey_assets/js/jquery.easing.min.js"></script>
        <script src="softkey_assets/js/bootstrap.min.js"></script>
        <!-- smoothscroll  -->
        <script src="softkey_assets/js/smoothscroll.js"></script>
        <!-- piechart  -->
        <script src="softkey_assets/js/jquery.easytabs.min.js"></script>
        <!-- tabs  -->
        <script src="softkey_assets/js/piechart.js"></script>
        <!-- animated header -->
        <script src="softkey_assets/js/particles.js" type="text/javascript"></script>
        <!-- sliders -->
        <script src="softkey_assets/js/owl.carousel.min.js"></script>
        <!-- contact form -->
        <script src="softkey_assets/js/jqBootstrapValidation.js"></script>
        <script src="softkey_assets/js/classie.js"></script>
        <!-- google map -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <!-- custom script -->
        <script src="softkey_assets/js/scripts.js"></script>
    </body>
</html>
