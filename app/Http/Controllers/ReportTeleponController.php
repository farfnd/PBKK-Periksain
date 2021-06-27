<?php

namespace App\Http\Controllers;

use App\Models\ReportTelepon;
use App\Http\Requests\StoreReportPhone;
use Exception;
use App\Services\ReportTeleponService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportTeleponController extends Controller
{
    protected $reportTeleponService;

    public function __construct(ReportTeleponService $reportTeleponService)
    {
        $this->reportTeleponService = $reportTeleponService;
    }

    // index
    public function index()
    {
        // return session('Bearer');
        $data = ReportTelepon::all();
        return $data;
    }

    public function getPhoneReportByUser()
    {
        // return session('Bearer');
        return $this->reportTeleponService->readUserPhoneReport();
    }

    // create
    public function store(StoreReportPhone $request){
        $input = $request->except(['_token']);
        $result = ['status' => 200];

        // save using services
        try{
            $result['data'] = $this->reportTeleponService->saveRequest($input);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $id = $result['data']['user_id'];
        $qrService = app()->make('SimpleQRService');
        $data = "Nama Pelapor: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Laporan: ".$id."; Nama Terlapor: ".$input['nama_terlapor']."; Kontak Pelaku: ".$input['kontak_pelaku']."; Waktu Pelaporan: ".$input['created_at']." WIB";
        
        $qr = $qrService->generateQR($data);

        return view('laporan.report_phone_success', ['report' => $request, 'qr' => $qr]);
    }

    // read
    public function display(){
        if(Auth::user()->role != 'user'){
            return "Anda tidak berhak mengakses halaman ini";
        }
        return view('laporan.report_bank');
    }

    public function displayUserBankReport(){
        return ReportTelepon::all();
    }

    // update

    // delete
}
