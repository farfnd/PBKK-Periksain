<?php

namespace App\Repositories;

use App\Models\ReportRekening;
use Illuminate\Support\Facades\Auth;

class ReportRekeningRepository{
    protected $report_rekening;

    public function __construct(ReportRekening $report_rekening)
    {
        $this->report_rekening = $report_rekening;
    }

    public function save($data){
        $report_rekening = new $this->report_rekening;

        $report_rekening->user_id = Auth::user()->id;
        $report_rekening->tipe_laporan = $data['tipe_laporan'];
        $report_rekening->nama_terlapor = $data['nama_terlapor'];
        $report_rekening->bank = $data['bank'];
        $report_rekening->nomor_rekening = $data['nomor_rekening'];
        $report_rekening->platform = $data['platform'];
        $report_rekening->kontak_pelaku = $data['kontak_pelaku'];
        $report_rekening->kronologi = $data['kronologi'];
        $report_rekening->total_kerugian = $data['total_kerugian'];

        $report_rekening->save();

        return $report_rekening->fresh();
    }

    public function getReportByUserID(){
        return ReportRekening::where('user_id', Auth::user()->id)->get();
        // return "TEST";
    }
}

?>