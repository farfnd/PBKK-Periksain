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
                                <li class="breadcrumb-item active" aria-current="page">Laporkan Penipuan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h5 class="card-title" style="text-align:center; "><b>LAPORKAN PENIPUAN</b></h5>
                                    <p class="page-desc" style="text-align:center;">Laporkan penipuan yang terjadi agar yang lainnya tidak terkena penipuan yang sama.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporkan Rekening</h5>
                                        <form method="POST" action="{{route('post_bank')}}" enctype="multipart/form-data">
                                            @csrf
                                            <p><b>Informasi Rekening</b></p>
                                            <div class="form-group">
                                                <!-- <label for="settings_firstname">Nama Pemilik Rekening</label> -->
                                                <input type="text" class="form-control" id="nama_terlapor" placeholder="Nama Pemilik Rekening" name="nama_terlapor" value="{{old('nama_terlapor')}}">
                                                @if ($errors->has('nama_terlapor'))
                                                    <span class="text-danger">{{ $errors->first('nama_terlapor') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <select class="form-control custom-select" id="bank" name="bank" value="{{old('bank')}}">
                                                        <option selected disabled hidden>Pilih Bank...</option>
                                                        <option>Bank BCA</option>
                                                        <option>Bank MANDIRI</option>
                                                        <option>Bank BNI</option>
                                                        <option>Bank BNI Syariah</option>
                                                        <option>Bank BRI</option>
                                                        <option>Bank SYARIAH MANDIRI (BSM)</option>
                                                        <option>Bank CIMB NIAGA SYARIAH</option>
                                                        <option>Bank CIMB NIAGA</option>
                                                        <option>Bank MUAMALAT</option>
                                                        <option>Bank BRI SYARIAH</option>
                                                        <option>Bank TABUNGAN NEGARA (BTN)</option>
                                                        <option>Bank PERMATA</option>
                                                        <option>Bank DANAMON</option>
                                                        <option>Bank BII MAYBANK</option>
                                                        <option>Bank MEGA</option>
                                                        <option>Bank SINARMAS</option>
                                                        <option>Bank COMMONWEALTH</option>
                                                        <option>Bank OCBC NISP</option>
                                                        <option>Bank BUKOPIN</option>
                                                        <option>Bank BCA SYARIAH</option>
                                                        <option>Bank LIPPO</option>
                                                        <option>CITIBANK</option>
                                                        <option>Bank BTPN</option>
                                                        <option>JENIUS</option>
                                                        <option>INDOSAT DOMPETKU</option>
                                                        <option>TELKOMSEL TCASH</option>
                                                        <option>Bank JABAR</option>
                                                        <option>Bank DKI JAKARTA</option>
                                                        <option>BPD DIY (YOGYAKARTA)</option>
                                                        <option>Bank JATENG (JAWA TENGAH)</option>
                                                        <option>Bank JATIM (JAWA TIMUR)</option>
                                                        <option>BPD JAMBI</option>
                                                        <option>BPD ACEH</option>
                                                        <option>Bank SUMUT</option>
                                                        <option>Bank NAGARI</option>
                                                        <option>Bank RIAU KEPRI</option>
                                                        <option>Bank SUMSEL BABEL</option>
                                                        <option>Bank LAMPUNG</option>
                                                        <option>BPD KALSEL</option>
                                                        <option>BPD KALIMANTAN BARAT</option>
                                                        <option>BPD KALTIM</option>
                                                        <option>BPD KALTENG</option>
                                                        <option>BPD SULSEL</option>
                                                        <option>Bank SULUT</option>
                                                        <option>BPD NTB</option>
                                                        <option>BPD BALI</option>
                                                        <option>Bank NTT</option>
                                                        <option>Bank MALUKU</option>
                                                        <option>BPD PAPUA</option>
                                                        <option>Bank BENGKULU</option>
                                                        <option>Bank SULAWESI TENGAH</option>
                                                        <option>Bank SULTRA</option>
                                                        <option>Bank EKSPOR INDONESIA</option>
                                                        <option>Bank PANIN</option>
                                                        <option>Bank ARTA NIAGA KENCANA</option>
                                                        <option>Bank UOB INDONESIA (Bank BUANA INDONESIA)</option>
                                                        <option>AMERICAN EXPRESS BANK LTD</option>
                                                        <option>CITIBANK N.A.</option>
                                                        <option>JP. MORGAN CHASE BANK, N.A.</option>
                                                        <option>Bank of AMERICA, N.A.</option>
                                                        <option>ING INDONESIA BANK</option>
                                                        <option>Bank MULTICOR</option>
                                                        <option>Bank ARTHA GRAHA INTERNASIONAL</option>
                                                        <option>Bank CREDIT AGRICOLE INDOSUEZ</option>
                                                        <option>THE BANGKOK BANK COMP. LTD</option>
                                                        <option>THE HONGKONG &amp; SHANGHAI B.C. (BANK HSBC)</option>
                                                        <option>THE BANK OF TOKYO MITSUBISHI UFJ LTD</option>
                                                        <option>BANK SUMITOMO MITSUI INDONESIA</option>
                                                        <option>BANK DBS INDONESIA</option>
                                                        <option>BANK RESONA PERDANIA</option>
                                                        <option>BANK MIZUHO INDONESIA</option>
                                                        <option>STANDARD CHARTERED BANK</option>
                                                        <option>BANK ABN AMRO</option>
                                                        <option>BANK KEPPEL TATLEE BUANA</option>
                                                        <option>BANK CAPITAL INDONESIA</option>
                                                        <option>BANK BNP PARIBAS INDONESIA</option>
                                                        <option>BANK UOB INDONESIA</option>
                                                        <option>KOREA EXCHANGE BANK DANAMON</option>
                                                        <option>RABOBANK INTERNASIONAL INDONESIA</option>
                                                        <option>Bank ANZ INDONESIA</option>
                                                        <option>DEUTSCHE BANK AG.</option>
                                                        <option>BANK WOORI SAUDARA</option>
                                                        <option>BANK OF CHINA</option>
                                                        <option>BANK BUMI ARTA</option>
                                                        <option>BANK EKONOMI</option>
                                                        <option>BANK ANTARDAERAH</option>
                                                        <option>BANK HAGA</option>
                                                        <option>BANK IFI</option>
                                                        <option>BANK CENTURY</option>
                                                        <option>BANK MAYAPADA</option>
                                                        <option>Other</option>
                                                        <option>Bank BTPN Syariah</option>
                                                        <option>Bank BUKOPIN SYARIAH</option>
                                                        <option>LINKAJA</option>
                                                        <option>BPD ACEH SYARIAH</option>
                                                        <option>Bank NTB SYARIAH</option>
                                                        <option>Bank BPD BANTEN</option>
                                                        <option>Bank PANIN DUBAI SYARIAH</option>
                                                        <option>DIGIBANK</option>
                                                        <option>Bank NUSANTARA PARAHYANGAN</option>
                                                        <option>Bank SWADESI (BANK OF INDIA INDONESIA)</option>
                                                        <option>BANK MESTIKA DHARMA</option>
                                                        <option>BANK SHINHAN INDONESIA (BANK METRO EXPRESS)</option>
                                                        <option>BANK MASPION INDONESIA</option>
                                                        <option>BANK HAGAKITA</option>
                                                        <option>BANK GANESHA</option>
                                                        <option>BANK WINDU KENTJANA</option>
                                                        <option>BANK ICBC INDONESIA (HALIM INDONESIA BANK)</option>
                                                        <option>BANK HARMONI INTERNATIONAL</option>
                                                        <option>BANK QNB KESAWAN (BANK QNB INDONESIA)</option>
                                                        <option>BANK HIMPUNAN SAUDARA 1906</option>
                                                        <option>BANK SWAGUNA</option>
                                                        <option>BANK BISNIS INTERNASIONAL</option>
                                                        <option>BANK SRI PARTHA</option>
                                                        <option>BANK JASA JAKARTA</option>
                                                        <option>BANK BINTANG MANUNGGAL</option>
                                                        <option>BANK MNC INTERNASIONAL (BANK BUMIPUTERA)</option>
                                                        <option>BANK YUDHA BHAKTI</option>
                                                        <option>BANK MITRANIAGA</option>
                                                        <option>BANK BRI AGRO NIAGA</option>
                                                        <option>BANK SBI INDONESIA (BANK INDOMONEX)</option>
                                                        <option>BANK ROYAL INDONESIA</option>
                                                        <option>BANK NATIONAL NOBU (BANK ALFINDO)</option>
                                                        <option>BANK MEGA SYARIAH</option>
                                                        <option>BANK INA PERDANA</option>
                                                        <option>BANK HARFA</option>
                                                        <option>PRIMA MASTER BANK</option>
                                                        <option>BANK PERSYARIKATAN INDONESIA</option>
                                                        <option>BANK AKITA</option>
                                                        <option>LIMAN INTERNATIONAL BANK</option>
                                                        <option>ANGLOMAS INTERNASIONAL BANK</option>
                                                        <option>BANK SAHABAT SAMPEORNA (BANK DIPO INTERNATIONAL)</option>
                                                        <option>BANK KESEJAHTERAAN EKONOMI</option>
                                                        <option>BANK ARTOS INDONESIA</option>
                                                        <option>BANK PURBA DANARTA</option>
                                                        <option>BANK MULTI ARTA SENTOSA</option>
                                                        <option>BANK MAYORA INDONESIA</option>
                                                        <option>BANK INDEX SELINDO</option>
                                                        <option>BANK VICTORIA INTERNATIONAL</option>
                                                        <option>BANK EKSEKUTIF</option>
                                                        <option>CENTRATAMA NASIONAL BANK</option>
                                                        <option>BANK FAMA INTERNASIONAL</option>
                                                        <option>BANK MANDIRI TASPEN POS (BANK SINAR HARAPAN BALI)</option>
                                                        <option>BANK HARDA</option>
                                                        <option>BANK AGRIS (BANK FINCONESIA)</option>
                                                        <option>BANK MERINCORP</option>
                                                        <option>BANK MAYBANK INDOCORP</option>
                                                        <option>BANK OCBC INDONESIA</option>
                                                        <option>BANK CTBC (CHINA TRUST) INDONESIA</option>
                                                        <option>BANK BJB SYARIAH</option>
                                                        <option>BPR KS (KARYAJATNIKA SEDAYA)</option>
                                                        <option>Lainnya/Bank Tidak Diketahui</option>
                                                    </select>
                                                    @if ($errors->has('bank'))
                                                        <span class="text-danger">{{ $errors->first('bank') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nomor_rekening" placeholder="Nomor Rekening" name="nomor_rekening" value="{{old('nomor_rekening')}}">
                                                    @if ($errors->has('nomor_rekening'))
                                                        <span class="text-danger">{{ $errors->first('nomor_rekening') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p></p>
                                            <p><b>Kontak Pelaku</b></p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <select class="form-control custom-select" id="platform" name="platform" value="{{old('platform')}}">>
                                                        <option selected disabled hidden>Pilih Platform</option>
                                                        <option>WhatsApp</option>
                                                        <option>Line</option>
                                                        <option>Facebook</option>
                                                        <option>Instagram</option>
                                                        <option>Lainnya</option>
                                                    </select>
                                                    @if ($errors->has('platform'))
                                                        <span class="text-danger">{{ $errors->first('platform') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="kontak_pelaku" placeholder="Kontak" name="kontak_pelaku" value="{{old('kontak_pelaku')}}">
                                                    @if ($errors->has('kontak_pelaku'))
                                                        <span class="text-danger">{{ $errors->first('kontak_pelaku') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p></p>
                                            <p><b>Kronologi</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" id="kronologi" rows="5" placeholder="Ceritakan konologi selengkap mungkin" name="kronologi">{{old('kronologi')}}</textarea>
                                                @if ($errors->has('kronologi'))
                                                    <span class="text-danger">{{ $errors->first('kronologi') }}</span>
                                                @endif
                                            </div>
                                            <p></p>
                                            <p><b>Total Kerugian</b></p>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="total_kerugian" placeholder="Rp." multiple name="total_kerugian" value="{{old('total_kerugian')}}">
                                                @if ($errors->has('total_kerugian'))
                                                    <span class="text-danger">{{ $errors->first('total_kerugian') }}</span>
                                                @endif
                                            </div>
                                            <p></p>
                                            <p><b>File-file Pendukung</b></p>
                                            <div class="form-group">
                                                <label for="file_bukti">Wajib menyertakan foto/tangkapan layar yang terkait dengan kronologi kejadian</label>
                                                <p>Foto harus bertipe .jpeg, .png, .jpg, atau .svg, dengan ukuran kurang dari 2 MB.</p>
                                                <input type="file" class="form-control" id="file_bukti" placeholder="File Pendukung" multiple name="file_bukti[]">
                                                @if ($errors->has('file_bukti'))
                                                    <span class="text-danger">{{ $errors->first('file_bukti') }}</span>
                                                @endif
                                                @foreach ($errors->get('file_bukti.*') as $messages)
                                                    <span class="text-danger">File {{$loop->index + 1}}:</span>
                                                    @foreach ($messages as $message)
                                                        <br>
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @endforeach
                                                    <br>
                                                @endforeach
                                            </div>
                                            <input type="text" class="form-control" name="tipe_laporan" value="rekening" hidden>
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
                                <span class="footer-text">2021 © Periksa.in</span>
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