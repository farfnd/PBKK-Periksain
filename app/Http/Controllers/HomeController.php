<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $query = Report::all();
        $total_kasus = count($query);
        $total_rek = 0;
        $total_tel = 0;
        $total_rugi = 0;

        foreach($query as $data){
            if($data->tipe_laporan == 'rekening'){
                $total_rek++;
            }else{
                $total_tel++;
            }
            $total_rugi += (int) $data->total_kerugian;
        }
        return view('home.landing', ['total_kasus'=>$total_kasus, 'total_rek'=>$total_rek, 'total_tel'=>$total_tel, 'total_rugi'=>"Rp. ".number_format($total_rugi,2,',','.')]);
    }

    public function show(Request $request)
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

    public function index_rek($no_rek)
    {
        // if(!UserController::isAuth()){
        //     return redirect(route('login'));
        // }

        $data = Report::where('nomor_rekening', $no_rek)->paginate(10);
        return view('cek.cek_rekening', ['data' => $data, 'no_rek'=> $no_rek]);
    }

    public function index_telp($no_telepon)
    {
        // if(!UserController::isAuth()){
        //     return redirect(route('login'));
        // }

        $data = Report::where('kontak_pelaku', $no_telepon)->paginate(10);
        return view('cek.cek_telepon', ['data' => $data, 'no_telepon'=> $no_telepon]);
    }

    public function get_report_image($id, $filename)
    {
        if(Auth::user()->id != $id){
            return route('show_404');
        }

        $storagePath = storage_path('app/report_images/' . $id . '/' . $filename);
        return response()->file($storagePath);
    }

    public function get_disclaimer_image($id, $filename)
    {
        if(Auth::user()->id != $id){
            return route('show_404');
        }

        $storagePath = storage_path('app/disclaimer_images/' . $id . '/' . $filename);
        return response()->file($storagePath);
    }
}
