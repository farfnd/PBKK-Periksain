                    <?php
                        use App\Http\Controllers\UserController;
    
                        $account = json_decode(UserController::get_user());

                        $name = $account->first_name . " " . $account->last_name;
                        $status_verified = $account->is_verified ? "Verified" : "Not Verified";
                    ?>
                    <nav class="navbar navbar-expand container">
                        <div class="logo-box"><a href="/" class="logo-text">Periksa.in</a></div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="/connect_assets/images/avatars/profile-image-1.png" alt="profile image">
                                    <span><?php echo $name ?> (<?php echo $status_verified ?>)</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/akun/verifikasi">Verifikasi Akun</a>
                                    <a class="dropdown-item" href="/akun/pengaturan">Pengaturan Akun</a>
                                    <a class="dropdown-item" href="/akun/logout">Keluar</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
                            </li>
                        </ul>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Reports</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="navbar-search">
                            <form>
                                <div class="form-group">
                                    <input type="text" disabled name="search" id="nav-search" placeholder="">
                                </div>
                            </form>
                        </div>
                    </nav>