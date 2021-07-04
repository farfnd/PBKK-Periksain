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
        <title>Periksa.in Admin - Lihat Laporan Telepon</title>

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
        @php
            $count=1;
        @endphp
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
                                <li class="breadcrumb-item"><a href="/#header">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lihat Laporan Telepon</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title">
                                <h5 class="card-title" style="text-align:center; "><b>Detail Laporan</b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Informasi Laporan</h5>
                                        <!-- <p>Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap.</p> -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <!-- <th scope="col">#</th>
                                                    <th scope="col">First</th>
                                                    <th scope="col">Last</th>
                                                    <th scope="col">Handle</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Nama Pelaku</th>
                                                    <td>
                                                    {{ $report->nama_terlapor }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Nomor Telepon</th>
                                                    <td>
                                                    {{ $report->kontak_pelaku }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kronologi</th>
                                                    <td>
                                                    {{ $report->kronologi }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Total Kerugian</th>
                                                    <td>
                                                    Belum Tersedia
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">File Pendukung</th>
                                                    <td>
                                                    @if($report->file_bukti)
                                                        @foreach (json_decode($report->file_bukti) as $bukti)
                                                            <img src="{{route('show_report_image', ['id' => $report->user_id, 'filename' => $bukti])}}" width="200px" alt="Data tidak ditemukan">
                                                        @endforeach
                                                    @else
                                                        <p>Data tidak ditemukan</p>
                                                    @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Status Verifikasi</th>
                                                    <td>
                                                        <?php
                                                            if($report->terverifikasi){
                                                                echo '<h6 class="badge bg-success text-white">Terverifikasi</h6>';
                                                            }else{
                                                                echo '<h6 class="badge bg-danger text-white">Belum Terverifikasi</h6>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <form method="POST" id="form_respon" action="{{route('admin.respon_report')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" class="form-control" name="tipe_laporan" value="rekening" hidden>
                                            <input type="text" class="form-control" name="id" value="{{ $report->id }}" hidden>
                                            <input type="text" class="form-control" name="status_respon" id="status_respon" value="" hidden>
                                            <button type="button" class="btn btn-success" onclick="verifikasi()">Diverifikasi</button>
                                            <button type="button" class="btn btn-danger" onclick="tolak()">Tangguhkan</button>
                                            <a href="/admin/sanggahan/all"><button type="button" class="btn btn-primary">Kembali</button></a>
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
    </body>
</html>