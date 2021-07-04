<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Http\Controllers\UserController;
use App\Http\Requests\StoreReportBank;
use App\Http\Requests\StoreReportPhone;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Services\ReportService;

use function PHPUnit\Framework\isNull;

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
        return view('laporan.report_history', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new report.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipe)
    {
        if($tipe == 'rekening'){
            $data_bank = Bank::all();
            return view('laporan.report_bank', ['data_bank' => $data_bank]);
        }
        if($tipe == 'telepon')
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
        $qr = $qrService->generateQR_bank($result['data']);

        // echo json_encode($result['data']); die();
        return view('laporan.report_bank_read', ['report' => $result['data'], 'qr' => $qr]);
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
        $qr = $qrService->generateQR_phone($result['data']);

        // echo json_encode($result['data']); die();
        return view('laporan.report_phone_read', ['report' => $result['data'], 'qr' => $qr]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200];

        // read using services
        try{
            $result['data'] = $this->reportService->readReport($id);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $qrService = app()->make('SimpleQRService');

        if($result['data']['tipe_laporan'] == 'rekening'){
            $qr = $qrService->generateQR_bank($result['data']);
            return view('laporan.report_bank_read', ['report' => $result['data'], 'qr' => $qr]);
        }
        else if($result['data']['tipe_laporan'] == 'telepon'){
            $qr = $qrService->generateQR_phone($result['data']);
            return view('laporan.report_phone_read', ['report' => $result['data'], 'qr' => $qr]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->reportService->readReport($id);
        if($data['tipe_laporan'] == 'rekening'){
            $data_bank = Bank::all();
            return view('laporan.report_bank_edit', ['report' => $data, 'data_bank' => $data_bank]);
        }
        else if($data['tipe_laporan'] == 'telepon'){
            return view('laporan.report_phone_edit', ['report' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request, $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qrService = app()->make('SimpleQRService');
        
        if($request['tipe_laporan'] == 'rekening'){
            $data = $this->update_bank(StoreReportBank::createFrom($request), $id);
            $qr = $qrService->generateQR_bank($data);
            return view('laporan.report_bank_read', ['report' => $data, 'qr' => $qr, 'profile_msg_read_info'=>'Laporan berhasil diperbarui!']);
        }
        else if($request['tipe_laporan'] == 'telepon'){
            $data = $this->update_phone(StoreReportPhone::createFrom($request), $id);
            $qr = $qrService->generateQR_phone($data);
            return view('laporan.report_phone_read', ['report' => $data, 'qr' => $qr, 'profile_msg_read_info'=>'Laporan berhasil diperbarui!']); 
        }    
    }

    private function update_bank(StoreReportBank $request, $id)
    {
        $request->validate($request->rules(), $request->messages());

        $input = $request->except(['_token']);
        $result = ['status' => 200];
        // dd($input); die();
        try{
            if($this->reportService->editReport($id, $input)){
                return $this->reportService->readReport($id);
            }
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }
    }

    public function update_phone(StoreReportPhone $request, $id)
    {
        $request->validate($request->rules(), $request->messages());
        
        $input = $request->except(['_token']);
        $result = ['status' => 200];
        // dd($input); die();
        try{
            if($this->reportService->editReport($id, $input)){
                return $this->reportService->readReport($id);
            }
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($this->reportService->deleteReport($request['id']));{
            if(Auth::user()->role == 'admin'){
                return redirect(route('admin.show_report'));
            }else{
                return view('laporan.report_history', ['profile_msg_read_info'=>'Laporan berhasil dihapus!']);
            }
        }
        if(Auth::user()->role == 'admin'){
            return redirect(route('admin.show_report'));
        }else{
            return view('laporan.report_history', ['profile_msg_error_info'=>'Laporan gagal dihapus!']);
        }
    }

    function view_laporan($id){
        $result = $this->reportService->readReportbyID($id);
        // return $result;
        if($result["tipe_laporan"] == 'rekening'){
            return view('laporan.report_view_detail_bank', ['report' => $result]);            
        }else{
            return view('laporan.report_view_detail_phone', ['report' => $result]);
        }
    }
}
