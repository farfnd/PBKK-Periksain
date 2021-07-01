<?php
    use App\Http\Controllers\UserController;
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
                    <div class="page-info container">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Akun</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
                            </ol>
                        </nav>
                    </div>
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
                                        <h5 class="card-title">Pengaturan Akun</h5>
                                        @if(Session::has('account_update_read'))
                                        <p style="color:green; text-align:center;">
                                            {{ Session::get('account_update_read') }}
                                            @php
                                                Session::forget('account_update_read');
                                            @endphp
                                        </p>
                                        @endif

                                        @if(Session::has('account_update_failed'))
                                        <p style="color:red; text-align:center;">
                                            {{ Session::get('account_update_failed') }}
                                            @php
                                                Session::forget('account_update_failed');
                                            @endphp
                                        </p>
                                        @endif
                                        <form method="POST" action="{{ route('post_update_account_detail') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="settings_firstname">Nama Depan</label>
                                                <input type="text" class="form-control" name="first_name" value="<?php echo Auth::user()->first_name ?>" id="settings_firstname" placeholder="Nama Depan">
                                                @error('first_name')
                                                <p style="color:red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="settings_lastname">Nama Belakang</label>
                                                <input type="text" class="form-control" name="last_name" value="<?php echo Auth::user()->last_name ?>" id="settings_lastname" placeholder="Nama Belakang">
                                                @error('last_name')
                                                <p style="color:red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo Auth::user()->email ?>" id="settings_email" aria-describedby="emailHelp" placeholder="Enter email">
                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                @error('email')
                                                <p style="color:red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_validation">Password</label>
                                                <input type="password" class="form-control" name="password_validation" id="password_validation" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Ganti Password</h5>
                                        @if(Session::has('password_update_read'))
                                        <p style="color:green; text-align:center;">
                                            {{ Session::get('password_update_read') }}
                                            @php
                                                Session::forget('password_update_read');
                                            @endphp
                                        </p>
                                        @endif

                                        @if(Session::has('password_update_failed'))
                                        <p style="color:red; text-align:center;">
                                            {{ Session::get('password_update_failed') }}
                                            @php
                                                Session::forget('password_update_failed');
                                            @endphp
                                        </p>
                                        @endif
                                        <form method="POST" action="{{ route('post_update_user_password') }}">
                                        @csrf
                                            <div class="form-group">
                                                <label for="password_validation">Password lama</label>
                                                <input type="password" class="form-control" name="password_validation" id="password_validation" placeholder="Password lama">
                                                @error('password_validation')
                                                <p style="color:red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password">Password baru</label>
                                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password baru">
                                                @error('new_password')
                                                <p style="color:red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_new_password">Konfirmasi password baru</label>
                                                <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Konfirmasi password baru">
                                                @error('confirm_new_password')
                                                <p style="color:red;">{{ $message }}</p>
                                                @enderror
                                            </div>
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
        <script src="/connect_assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/popper.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/connect_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/connect_assets/js/connect.min.js"></script>
    </body>
</html>