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
        <title>Periksa.in Admin - Lihat Laporan</title>

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
                    @include('includes.page-header-admin', ['name' => 'Anisa Rahmawati', 'status' => 'Verified'])
                </div>
                <div class="horizontal-bar">
                    @include('includes.horizontal-bar-admin')
                </div>
                <div class="page-content">
                    <div class="page-info container">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lihat Laporan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h5 class="card-title" style="text-align:center; "><b>LAPORAN DETAIL</b></h5>
                                    <!-- <p class="page-desc" style="text-align:center;">Laporkan penipuan yang terjadi agar yang lainnya tidak terkena penipuan yang sama.</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Nomor Rekening</h5>
                                        <p><b>Terverifikasi : <?php if($report->terverifikasi) echo '<h6 class="badge bg-success text-white">Terverifikasi</h6>'; else echo '<h6 class="badge bg-danger text-white">Belum Terverifikasi</h6>'; ?></b></p>
                                        <form method="POST" id="form_respon" action="{{route('admin.respon_report')}}" enctype="multipart/form-data">
                                            @csrf
                                            <p><b>Informasi Rekening</b></p>
                                            <div class="form-group">
                                                <!-- <label for="settings_firstname">Nama Pemilik Rekening</label> -->
                                                <input type="text" class="form-control" id="nama_terlapor" placeholder="Nama Pemilik Rekening" name="nama_terlapor" value="{{ $report->nama_terlapor }}" disabled="">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="bank" placeholder="Bank" name="bank" value="{{ $report->bank }}" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nomor_rekening" placeholder="Nomor Rekening" name="nomor_rekening" value="{{ $report->nomor_rekening }}" disabled="">
                                                </div>
                                            </div>
                                            <p></p>
                                            <p><b>Kontak Pelaku</b></p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="platform" placeholder="platform" name="platform" value="{{ $report->platform }}" disabled="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="kontak_pelaku" placeholder="Kontak" name="kontak_pelaku" value="{{ $report->kontak_pelaku }}" disabled="">
                                                </div>
                                            </div>
                                            <p></p>
                                            <p><b>Kronologi</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" id="kronologi" rows="5" placeholder="Ceritakan konologi selengkap mungkin" name="kronologi" disabled="">{{ $report->kronologi }}</textarea>
                                            </div>
                                            <p></p>
                                            <p><b>Total Kerugian</b></p>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="total_kerugian" placeholder="Rp." multiple name="total_kerugian" value="{{ $report->total_kerugian }}" disabled="">
                                            </div>
                                            <p></p>
                                            <p><b>File-file Pendukung</b></p>
                                            <div class="form-group">
                                                @if($report->file_bukti)
                                                    @foreach (json_decode($report->file_bukti) as $bukti)
                                                        <img src="{{route('show_report_image', ['id' => $report->user_id, 'filename' => $bukti])}}" width="200px" alt="Data tidak ditemukan">
                                                    @endforeach
                                                @else
                                                    <p>Data tidak ditemukan</p>
                                                @endif
                                            </div>
                                            <input type="text" class="form-control" name="tipe_laporan" value="rekening" hidden>
                                            <input type="text" class="form-control" name="id" value="{{ $report->id }}" hidden>
                                            <input type="text" class="form-control" name="status_respon" id="status_respon" value="" hidden>
                                            
                                            <button type="button" class="btn btn-success" onclick="verifikasi()">Diverifikasi</button>
                                            <button type="button" class="btn btn-danger" onclick="tolak()">Tangguhkan</button>
                                            <a href="/admin/laporan/all"><button type="button" class="btn btn-primary">Kembali</button></a>
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
        <script>
            function verifikasi(){
                $('#status_respon').val("verifikasi");
                $('#form_respon').submit();
            }

            function tolak(){
                $('#status_respon').val("tolak");
                $('#form_respon').submit();
            }
        </script>
        <script type="text/javascript">

            
            $(function () {                
                $('#tombol_hapus').on('click', function () {
                    document.getElementById("form_hapus").submit(); 
                });
            });
        </script>
    </body>
</html>