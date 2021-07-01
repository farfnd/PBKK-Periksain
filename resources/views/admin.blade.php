<?php
    use App\Http\Controllers\UserController;
    $account = Auth::user();
?>

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
                            <a class="page-scroll" href="/admin/buat_akun/">Buat Akun Baru</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/akun/sanggahan/">Sanggahan</a>
                        </li>
                        @auth
                        <li>
                            <a class="page-scroll" href="{{ route('get_account_setting') }}">Halo, {{Auth::user()->first_name}}</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{ route('logout') }}">Logout</a>
                        </li>
                        @else
                        <li>
                            <a class="page-scroll" href="{{ route('login') }}">Login</a>
                        </li>
                        @endauth
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
                    <span class="intro-heading">Ini halaman admin</span>
                </div>
            </div>
            <div id="particles-js"></div>
        </header>
        <!-- END HEADER -->
        <!-- SERVICES -->
       
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
        <!-- END TESTIMONIALS -->
        <!-- TEAM -->
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
                                    <a class="page-scroll" href="{{ route('report.create', ['tipe' => 'rekening']) }}">Laporkan Nomor Rekening</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="#statistik">Statistik</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="{{ route('report.create', ['tipe' => 'telepon']) }}">Laporkan Nomor Telepon</a>
                                </li>
                                <li class="active">
                                    <a class="page-scroll" href="/akun/sanggahan/">Sanggah Laporan</a>
                                </li>
                                <li class="">
                                    <a class="page-scroll" href="{{ route('get_report_history') }}">Riwayat Laporan</a>
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
                            <span>{{date("Y")}} © Periksa.in </span>
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
        <script type="text/javascript">
            var curr_type = 'rekening';
            function updateForm(type) {
                curr_type = type;
                
                if(curr_type == 'rekening'){
                    document.getElementById("switch_rekening").style.background = "#273140";
                    document.getElementById("switch_telepon").style.background = "#fff";
                }else{
                    document.getElementById("switch_telepon").style.background = "#273140";
                    document.getElementById("switch_rekening").style.background = "#fff";
                }
            }

            function periksa(){
                var nomor = document.getElementById("nomor").value;
                location.replace("/cek/" + curr_type + "/" + nomor);
            }
        </script>
    </body>
</html>
