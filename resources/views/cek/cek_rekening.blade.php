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
        <title>Periksa.in - Laporkan Penipuan</title>

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
                    @include('includes.page-header', ['name' => 'Anisa Rahmawati', 'status' => 'Verified'])
                </div>
                <div class="horizontal-bar">
                    @include('includes.horizontal-bar')
                </div>
                <div class="page-content">
                    <div class="page-info container">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/#header">Periksa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Rekening</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title">
                                <h5 class="card-title" style="text-align:center; "><b>Hasil Periksa Nomor Rekening</b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Informasi Nomor Rekening</h5>
                                        @isset($data->first()->nomor_rekening)
                                            <div class="alert alert-danger outline-alert" role="alert" style="text-align:center;">Hati-hati, rekening memiliki catatan laporan penipuan!</div>
                                        @else
                                            <div class="alert alert-success outline-alert" role="alert" style="text-align:center;">Rekening ini tidak memiliki riwayat laporan penipuan!</div>
                                        @endisset
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
                                                    <th scope="row">Nomor Rekening</th>
                                                    <td>
                                                        @isset($data->first()->nomor_rekening)
                                                            {{ $data->first()->nomor_rekening }}
                                                        @else
                                                            {{ $no_rek }}
                                                        @endisset
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Nama Pemilik</th>
                                                    <td>
                                                        @isset($data->first()->nama_terlapor)
                                                            {{ $data->first()->nama_terlapor }}
                                                        @else
                                                            Tidak diketahui
                                                        @endisset
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Bank</th>
                                                    <td>
                                                        @isset($data->first()->bank)
                                                            {{ $data->first()->bank }}
                                                        @else
                                                            Tidak diketahui
                                                        @endisset
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title">Riwayat Laporan</h5>
                                        <!-- <p>Use the modifier classes <code>.thead-light</code> or <code>.thead-dark</code> to make <code>&lt;thead&gt;</code>s appear light or dark gray.</p> -->
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Waktu Pelaporan</th>
                                                    <th scope="col">Total Kerugian</th>
                                                    <th scope="col">Selengkapnya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $report)
                                                <tr>
                                                    <th scope="row"><?php
                                                        echo $count++;
                                                    ?>
                                                    </th>
                                                    <td>{{$report->created_at}}</td>
                                                    <td>
                                                        <?php echo "Rp".number_format($report->total_kerugian,2,',','.'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#">Selengkapnya</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $data->links() }}
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
                                <span class="footer-text"> {{date("Y")}} © Periksa.in</span>
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