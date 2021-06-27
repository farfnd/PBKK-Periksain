<?php

namespace App\Http\Controllers;

use App\Models\ReportRekening;
use App\Http\Requests\StoreReportBank;
use Exception;
use App\Services\ReportRekeningService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportRekeningController extends Controller
{
    protected $reportRekeningService;

    public function __construct(ReportRekeningService $reportRekeningService)
    {
        $this->reportRekeningService = $reportRekeningService;
    }

    // index
    public function index()
    {
        // return session('Bearer');
        $products = ReportRekening::all();
        return $products;
    }

    public function getBankReportByUser()
    {
        // return session('Bearer');
        return $this->reportRekeningService->readUserBankReport();
    }


    public function getAuthorization(){
        return session('Authorization');
    }

    // create
    public function store(StoreReportBank $request){
        $input = $request->except(['_token']);
        $result = ['status' => 200];

        // save using services
        try{
            $result['data'] = $this->reportRekeningService->saveRequest($input);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $id = $result['data']['user_id'];
        $qrService = app()->make('SimpleQRService');
        $data = "Nama Pelapor: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Laporan: ".$id."; Nama Terlapor: ".$input['nama_terlapor']."; Bank: ".$input['bank']."; Nomor Rekening: ".$input['nomor_rekening']."; Waktu Pelaporan: ".$input['created_at']." WIB";
        
        $qr = $qrService->generateQR($data);

        return view('laporan.report_bank_success', ['report' => $request, 'qr' => $qr]);
    }

    // read
    public function display(){
        if(Auth::user()->role != 'user'){
            return "Anda tidak berhak mengakses halaman ini";
        }
        return view('laporan.report_bank');
    }

    public function displayUserBankReport(){
        return ReportRekening::all();
        // return $this->reportRekeningService->readUserBankReport();
    }

    // update

    // delete
}
