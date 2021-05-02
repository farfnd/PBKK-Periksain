                    <div class="logo-box"><a href="/" class="logo-text">Periksa.in</a></div>
                    <a href="#" class="hide-horizontal-bar"><i class="material-icons">close</i></a>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="horizontal-bar-menu">
                                    <ul>
                                        <li><a href="/#header">Periksa Rekening/Telepon</a></li>
                                        <li><a href="#">Laporkan Penipuan<i class="material-icons">keyboard_arrow_down</i></a>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('get_bank_form') }}">Rekening</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('get_phone_form') }}">Nomor Telepon</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Sanggahan<i class="material-icons">keyboard_arrow_down</i></a>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('get_disclaimer_form') }}">Buat Sanggahan</a>
                                                </li>
                                                <li>
                                                    <a href="/akun/sanggahan/riwayat">Riwayat Sanggahan</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a>|</a></li>
                                        <li><a href="{{ route('get_report_history') }}">Laporan Saya</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>