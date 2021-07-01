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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="/connect_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/connect_assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="/connect_assets/plugins/DataTables/datatables.min.css" rel="stylesheet">   
   
        <!-- Theme Styles -->
        <link href="/connect_assets/css/connect.min.css" rel="stylesheet">
        <link href="/connect_assets/css/admin2.css" rel="stylesheet">
        <link href="/connect_assets/css/dark_theme.css" rel="stylesheet">
        <link href="/connect_assets/css/custom.css" rel="stylesheet">
        <style>
            body.modal-open {
                overflow: visible;
                position: absolute;
                width: 100%;
                height:100%;
            }
        </style>

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
                    @include('includes.page-header', ['name' => 'Anisa Rahmawati', 'status' => 'Verified'])
                </div>
                <div class="horizontal-bar">
                    @include('includes.horizontal-bar')
                </div>
                <div class="page-content">
                    <div class="page-info container">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Akun</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Riwayat Pelaporan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h5 class="card-title" style="text-align:center; "><b>RIWAYAT PELAPORAN</b></h5>
                                    <!-- <p class="page-desc" style="text-align:center;">Laporkan penipuan yang terjadi agar yang lainnya tidak terkena penipuan yang sama.</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
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
                                        <h5 class="card-title">RIWAYAT PELAPORAN ANDA</h5>
                                        <!-- <p>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.</p> -->
                                        <table id="zero-conf" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tipe</th>
                                                    <th>Nomor</th>
                                                    <th>Waktu Pelaporan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="report_content">
                                                @foreach ($reports as $report)
                                                <tr>
                                                    <td>
                                                        <a href="{{route('report.show', $report->id)}}">{{ $report->id }}</a>
                                                    </td>
                                                    <td>
                                                        @if($report->tipe_laporan == 'rekening')
                                                        Rekening
                                                        @else
                                                        Telepon
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($report->tipe_laporan == 'rekening')
                                                        {{ $report->nomor_rekening }}
                                                        @else
                                                        {{ $report->kontak_pelaku }}
                                                        @endif
                                                    </td>
                                                    <td>{{$report->created_at}}</td>
                                                    <td>
                                                        @if($report->terverifikasi)
                                                            <h6 class="badge bg-success text-white">Terverifikasi</h6>
                                                        @else
                                                            <h6 class="badge bg-danger text-white">Belum Terverifikasi</h6>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline m-0">
                                                            @if(!$report->terverifikasi)
                                                            <li class="list-inline-item">
                                                                <a class="btn btn-primary btn-sm rounded-0 text-white"  role="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('report.edit', ['id' => $report->id]) }}"><i class="fa fa-edit"></i></a>
                                                            </li>
                                                            @endif
                                                            <li class="list-inline-item">
                                                                <button type="button" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" data-html="{{$report->id}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
        
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Apakah Anda yakin akan menghapus laporan ini?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tindakan ini tidak bisa dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" id="tombol_hapus">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <form id="form_hapus" method="POST" action="{{route('report.destroy')}}" style="display: none;">
            @method('DELETE')
            @csrf
            <input hidden type="text" name="id" id="id">
        </form>

        <!-- Javascripts -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        
        <script src="/connect_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/connect_assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <script src="/connect_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/connect_assets/plugins/DataTables/datatables.min.js"></script>
        <script src="/connect_assets/js/connect.min.js"></script>
        <script src="/connect_assets/js/pages/datatables.js"></script>

        <script type="text/javascript">
            $(function () {
                $('[data-tooltip="tooltip"]').tooltip({
                    trigger: 'hover'
                });
            });
            $('[data-toggle="tooltip"]').on('click', function () {
                $(this).tooltip('hide');
                let id_laporan = $(this).attr('data-html');

                document.getElementById("id").value = id_laporan;
            });  
            $('#tombol_hapus').on('click', function () {
                document.getElementById("form_hapus").submit(); 
            });  
            // $(function() {
            //     $.ajax({
            //         url: "/api/user/getBankReport",
            //         headers: { 'Authorization': '{{ session("Authorization") }}' }
            //     }).done(function(msg) {
            //         msg.forEach(item => {
            //             var content = `
            //             <tr>
            //                 <td>`+ item["id"] +`</td>
            //                 <td>Rekening</td>
            //                 <td>
            //                 `+ item["nomor_rekening"] +`
            //                 </td>
            //                 <td>`+ item["created_at"] +`</td>
            //                 <td>`+ item["tipe_laporan"] +`</td>
            //             </tr>
            //             `;
            //             $("#report_content").append(content);
            //         });
            //     });
            // });
            // $(function() {
            //     $.ajax({
            //         url: "/api/user/getPhoneReport",
            //         headers: { 'Authorization': '{{ session("Authorization") }}' }
            //     }).done(function(msg) {
            //         msg.forEach(item => {
            //             var content = `
            //             <tr>
            //                 <td>`+ item["id"] +`</td>
            //                 <td>Nomor Telepon</td>
            //                 <td>
            //                 `+ item["nomor_telepon"] +`
            //                 </td>
            //                 <td>`+ item["created_at"] +`</td>
            //                 <td>`+ item["tipe_laporan"] +`</td>
            //             </tr>
            //             `;
            //             $("#report_content").append(content);
            //         });
            //     });
            // });
        </script>
    </body>
</html>