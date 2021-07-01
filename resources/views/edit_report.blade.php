<?php
    use App\Http\Controllers\UserController;

    $account = json_decode(UserController::get_user());
?>

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
        <title>Periksa.in - Akun Settings</title>

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
                    @include('includes.page-header', ['name' => 'Anisa Rahmawati', 'status' => 'Verified'])
                </div>
                <div class="horizontal-bar">
                    @include('includes.horizontal-bar')
                </div>
                <div class="page-content">
                    
                    <div class="main-wrapper container">
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <p class="page-desc">Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Edit laporan telepon</h5>
                                        @isset($profile_msg_read_info)
                                            <p style="color:green; text-align:center;">{{ $profile_msg_read_info }}</p>
                                        @endisset
                                        @isset($profile_msg_error_info)
                                            <p style="color:red; text-align:center;">{{ $profile_msg_error_info }}</p>
                                        @endisset
                                        <form method="POST" action="{{ route('report.create', ['tipe' => 'telepon']) }}">
                                            @csrf
                                            <input type="hidden" name="form_type" value="update_profile"/>
                                            <p><b>Kontak Pelaku</b></p>
                                            
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nama_terlapor" placeholder="Nama Pelaku"  name="nama_terlapor">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="kontak_pelaku" placeholder="Nomor Telepon Pelaku" name="kontak_pelaku">
                                                </div>
                                            
                                            <p></p>
                                            <p><b>Kronologi</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" id="kronologi" rows="5"  placeholder="Ceritakan konologi selengkap mungkin"  name="kronologi"></textarea>
                                            </div>
                                            <p></p>
                                            <p><b>Total Kerugian</b></p>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="total_kerugian" placeholder="Rp." multiple  name="total_kerugian">
                                            </div>
                                            <p></p>
                                            <p><b>File-file Pendukung</b></p>
                                            <div class="form-group">
                                                <label for="file">Wajib menyertakan foto/tangkapan layar yang terkait dengan kronologi kejadian</label>
                                                <input type="file" class="form-control" id="file" placeholder="File Pendukung" multiple  name="file">
                                            </div>
                                            <input type="timestamp" class="form-control" id="created_at" name="created_at" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("Y-m-d H:i:s"); ?>" hidden>
                                            <input type="text" class="form-control" name="tipe_laporan" value="telepon" hidden>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
        <script src="/connect_assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/popper.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/connect_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/connect_assets/js/connect.min.js"></script>
    </body>
</html>