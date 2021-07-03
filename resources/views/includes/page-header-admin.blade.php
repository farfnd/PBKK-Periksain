                    <?php
                        use App\Http\Controllers\UserController;
                        use Illuminate\Support\Facades\Auth;
    
                        $name = Auth::user()->first_name . " " . Auth::user()->last_name;
                    ?>
                    <nav class="navbar navbar-expand container">
                        <div class="logo-box"><a href="/" class="logo-text">Periksa.in Admin</a></div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="/connect_assets/images/avatars/profile-image-1.png" alt="profile image">
                                    <span><?php echo $name ?></span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
                                </a>
                                <div id="dropdown" class="dropdown-menu" aria-labelledby="navbarDropdown">
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