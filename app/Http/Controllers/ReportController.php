<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::where('user_id', Auth::user()->id)->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_bank(Request $request)
    {
        // return $request;
        Report::create([
            'user_id' => Auth::user()->id,
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
        // return $request;
        Report::create([
            'user_id' => Auth::user()->id,
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
    public function update_phone(Request $request, Report $report){

        // return $request->input();

        $query_result = Reports::where('id', Auth::user()->id)->first();
        
        User::where('id', Auth::user()->id)->update([
            'nama_terlapor' => $request->nama_terlapor,
            'kontak_pelaku' => $request->kontak_pelaku,
            'kronologi' => $request->kronologi,
            'total_kerugian' => $request->total_kerugian                
        ]);
        return view('laporan.edit_report', ['profile_msg_success_info'=>'Data berhasil di update!']);    
            
        
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
