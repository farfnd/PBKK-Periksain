<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class HomeController extends Controller
{
    public function cek(Request $request)
    {
        $cek_no = $request->nomor;
        $data_rekening = Report::where('nomor_rekening', $cek_no)->get()->first();
        $data_telepon = Report::where('kontak_pelaku', $cek_no)->get()->first();
        if($data_rekening) {
            return redirect()->route('cek_rekening',['no_rek' => $cek_no]);
        } else if (!$data_rekening && $data_telepon){
            return redirect()->route('cek_telepon', ['no_telepon' => $cek_no]);
        }
    }

    public function get_cek_rek($no_rek)
    {
        $data = Report::where('nomor_rekening', $no_rek)->get();
        return view('cek_rekening', ['data' => $data]);
    }

    public function get_cek_telp($no_telepon)
    {
        $data = Report::where('kontak_pelaku', $no_telepon)->get();
        return view('cek_telepon', ['data' => $data]);
    }
}
