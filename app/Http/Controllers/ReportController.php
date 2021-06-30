<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Http\Controllers\UserController;
use App\Http\Requests\StoreReportBank;
use App\Http\Requests\StoreReportPhone;
use Illuminate\Http\Request;
use App\Services\ReportService;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function getReportByUser()
    {
        // return session('Bearer');
        return $this->reportService->readUserReports();
    }

    public function getBankReportByUser()
    {
        // return session('Bearer');
        return $this->reportService->readUserBankReport();
    }

    public function getPhoneReportByUser()
    {
        // return session('Bearer');
        return $this->reportService->readUserPhoneReport();
    }

    public function getAuthorization(){
        return session('Authorization');
    }

    public static function isAuth(){
        if(!Auth::check()) return false;
        else return true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = $this->getReportByUser();
        // return json_encode($reports);
        return view('laporan.report_history', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new bank account report.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_bank()
    {
        return view('laporan.report_bank');
    }

    /**
     * Show the form for creating a new phone number report.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_phone()
    {
        return view('laporan.report_phone');
    }

    /**
     * Store a newly created bank account report in storage.
     *
     * @param  \Illuminate\Http\StoreReportBank  $request
     * @return \Illuminate\Http\Response
     */
    public function store_bank(StoreReportBank $request)
    {
        // echo json_encode($request->file); die();
        $input = $request->except(['_token']);
        $result = ['status' => 200];
        
        // save using services
        try{
            // echo json_encode($input); die();
            $result['data'] = $this->reportService->saveRequest($input);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $qrService = app()->make('SimpleQRService');
        $data = "Nama Pelapor: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Laporan: ".$result['data']['id']."; Nama Terlapor: ".$input['nama_terlapor']."; Bank: ".$input['bank']."; Nomor Rekening: ".$input['nomor_rekening']."; Waktu Pelaporan: ".$result['data']['created_at']." WIB";
        
        $qr = $qrService->generateQR($data);

        // echo json_encode($result['data']); die();

        return view('laporan.report_bank_success', ['report' => $result['data'], 'qr' => $qr]);
    }

    /**
     * Store a newly created phone number report in storage.
     *
     * @param  \Illuminate\Http\StoreReportPhone  $request
     * @return \Illuminate\Http\Response
     */
    public function store_phone(StoreReportPhone $request)
    {
        $input = $request->except(['_token']);
        $result = ['status' => 200];

        // save using services
        try{
            $result['data'] = $this->reportService->saveRequest($input);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $qrService = app()->make('SimpleQRService');
        $data = "Nama Pelapor: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Laporan: ".$result['data']['id']."; Nama Terlapor: ".$input['nama_terlapor']."; Kontak Pelaku: ".$input['kontak_pelaku']."; Waktu Pelaporan: ".$result['data']['created_at']." WIB";
        
        $qr = $qrService->generateQR($data);

        // echo json_encode($result['data']); die();
        return view('laporan.report_phone_success', ['report' => $result['data'], 'qr' => $qr]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update_phone(Request $request, Report $report){

        // return $request->input();

        $query_result = Reports::where('id', Auth::user()->id)->first();
        
        Reports::where('id', Auth::user()->id)->update([
            'nama_terlapor' => $request->nama_terlapor,
            'kontak_pelaku' => $request->kontak_pelaku,
            'kronologi' => $request->kronologi,
            'total_kerugian' => $request->total_kerugian                
        ]);
        return view('laporan.edit_report', ['profile_msg_success_info'=>'Data berhasil diperbarui!']);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
