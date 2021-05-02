<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function isAuth(){
        $account = json_decode(UserController::get_user());

        if($account->error_msg != 0) return false;
        else return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }

        $reports = Report::where('user_id', session('userid'))->get();
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
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }

        return view('laporan.report_bank');
    }

    /**
     * Show the form for creating a new phone number report.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_phone()
    {
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }

        return view('laporan.report_phone');
    }

    /**
     * Store a newly created bank account report in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_bank(Request $request)
    {
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }

        // return $request;
        Report::create([
            'user_id' => session('userid'),
            'tipe_laporan' => $request->tipe_laporan,
            'nama_terlapor' => $request->nama_terlapor,
            'bank' => $request->bank,
            'nomor_rekening' => $request->nomor_rekening,
            'platform' => $request->platform,
            'kontak_pelaku' => $request->kontak_pelaku,
            'kronologi' => $request->kronologi,
            'total_kerugian' => $request->total_kerugian,
            'file' => $request->file,
            'created_at' => $request->created_at,
        ]);

        return view('laporan.report_bank_success', ['report' => $request]);
    }

    /**
     * Store a newly created phone number report in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_phone(Request $request)
    {
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }

        // return $request;
        Report::create([
            'user_id' => session('userid'),
            'tipe_laporan' => $request->tipe_laporan,
            'nama_terlapor' => $request->nama_terlapor,
            'kontak_pelaku' => $request->kontak_pelaku,
            'kronologi' => $request->kronologi,
            'total_kerugian' => $request->total_kerugian,
            'file' => $request->file,
            'created_at' => $request->created_at,
        ]);

        return view('laporan.report_phone_success', ['report' => $request]);
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
    public function update(Request $request, Report $report)
    {
        //
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
