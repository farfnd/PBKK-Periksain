<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRService
{
    public function generateQR_bank($input)
    {
        $data =  "Nama Pelapor: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Laporan: ".$input['id']."; Nama Terlapor: ".$input['nama_terlapor']."; Bank: ".$input['bank']."; Nomor Rekening: ".$input['nomor_rekening']."; Waktu Pelaporan: ".$input['created_at']." WIB";
        return QrCode::size(100)->generate($data);
    }

    public function generateQR_phone($input)
    {
        $data = "Nama Pelapor: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Laporan: ".$input['id']."; Nama Terlapor: ".$input['nama_terlapor']."; Kontak Pelaku: ".$input['kontak_pelaku']."; Waktu Pelaporan: ".$input['created_at']." WIB";
        return QrCode::size(100)->generate($data);
    }

    public function generateQR_disclaimer($input)
    {
        $data = "Nama Penyanggah: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Sanggahan: ".$input['id']."; ID Laporan: ".$input['id_laporan']."; Waktu Penyanggahan: ".$input['created_at']." WIB";
        return QrCode::size(100)->generate($data);
    }
}
