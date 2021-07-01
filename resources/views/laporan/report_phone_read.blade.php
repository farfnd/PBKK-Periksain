<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="Periksa.in">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>
            Periksa.in -  
            @if (Request::segment(2) == 'laporkan')
                Laporan Terkirim
            @elseif (Request::segment(2) == 'laporan')
                Lihat Laporan  
            @endif
        </title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="/connect_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/connect_assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="/connect_assets/css/connect.min.css" rel="stylesheet">
        <link href="/connect_assets/css/admin2.css" rel="stylesheet">
        <link href="/connect_assets/css/dark_theme.css" rel="stylesheet">
        <link href="/connect_assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="page-container">
                <div class="page-header">
                    @include('includes.page-header')
                </div>
                <div class="horizontal-bar">
                    @include('includes.horizontal-bar')
                </div>
                <div class="page-content">
                    <div class="page-info container">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Akun</a></li>
                                <li class="breadcrumb-item">
                                    @if (Request::segment(2) == 'laporkan')
                                        <a href="{{ route('report.create', ['tipe' => 'rekening']) }}">Laporkan Penipuan</a>
                                    @elseif (Request::segment(2) == 'laporan')
                                        <a href="{{ route('get_report_history') }}">Riwayat Pelaporan</a>  
                                    @endif
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @if (Request::segment(2) == 'laporkan')
                                        Laporan Terkirim
                                    @elseif (Request::segment(2) == 'laporan')
                                        Lihat Laporan  
                                    @endif
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h5 class="card-title" style="text-align:center; ">
                                        <b>
                                            @if (Request::segment(2) == 'laporkan')
                                                PELAPORAN BERHASIL
                                            @elseif (Request::segment(2) == 'laporan')
                                                LIHAT LAPORAN  
                                            @endif
                                        </b>
                                    </h5>
                                    <p class="page-desc" style="text-align:center;">Laporan berhasil terkirim dengan detail sebagai berikut.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        @isset($profile_msg_read_info)
                                            <div class="alert alert-success" role="alert">
                                                {{ $profile_msg_read_info }}
                                            </div>
                                        @endisset
                                        @isset($profile_msg_error_info)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $profile_msg_read_info }}
                                            </div>
                                        @endisset
                                        <h5 class="card-title">Laporan Nomor Telepon</h5>
                                        <form>
                                            @if (Request::segment(2) == 'laporan')
                                                <p><b>Status Laporan</b></p>
                                                @if($report->terverifikasi)
                                                    <h6 class="badge bg-success text-white">Terverifikasi</h6>
                                                @else
                                                    <h6 class="badge bg-danger text-white">Belum Terverifikasi</h6>
                                                @endif
                                                <p></p>
                                            @endif
                                            <p><b>Kontak Pelaku</b></p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nama_terlapor">Nama Pelaku</label>
                                                    <input type="text" class="form-control" id="nama_terlapor" name="nama_terlapor" value="{{$report->nama_terlapor}}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="kontak_pelaku">Kontak Pelaku</label>
                                                    <input type="text" class="form-control" id="kontak_pelaku" name="kontak_pelaku" value="{{$report->kontak_pelaku}}" readonly>
                                                </div>
                                            </div>
                                            <p></p>
                                            <p><b>Kronologi</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" id="kronologi" rows="5" name="kronologi"  readonly>{{$report->kronologi}}</textarea>
                                            </div>
                                            <p></p>
                                            <p><b>Total Kerugian</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="total_kerugian" name="total_kerugian" value="<?php echo "Rp".number_format($report->total_kerugian,2,',','.'); ?>" readonly>
                                            </div>
                                            <p></p>
                                            <p><b>File-file Pendukung</b></p>
                                            @if($report->file_bukti)
                                                @foreach (json_decode($report->file_bukti) as $bukti)
                                                    <img src="{{route('show_report_image', ['id' => Auth::user()->id, 'filename' => $bukti])}}" width="200px" alt="Data tidak ditemukan">
                                                @endforeach
                                            @else
                                                <p>Data tidak ditemukan</p>
                                            @endif
                                            <p></p>
                                            <p><b>Kode QR</b></p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{$qr}}
                                                </div>
                                            </div>
                                            <p></p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn btn-primary col-md-12 <?php if($report->terverifikasi) echo "disabled"?>" href="/" >Edit laporan</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-primary col-md-12" href="/" >Kembali ke halaman utama</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="footer-text">{{date("Y")}} © Periksa.in</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascripts -->
        <script src="/connect_assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/popper.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/connect_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/connect_assets/js/connect.min.js"></script>
    </body>
</html>