<?php

namespace App\Repositories;

use App\Models\ReportTelepon;
use Illuminate\Support\Facades\Auth;

class ReportTeleponRepository{
    protected $report_telepon;

    public function __construct(ReportTelepon $report_telepon)
    {
        $this->report_telepon = $report_telepon;
    }

    public function save($data){
        $report_telepon = new $this->report_telepon;

        $report_telepon->user_id = Auth::user()->id;
        $report_telepon->tipe_laporan = $data['tipe_laporan'];
        $report_telepon->nama_terlapor = $data['nama_terlapor'];
        $report_telepon->nomor_telepon = $data['nomor_telepon'];
        $report_telepon->kronologi = $data['kronologi'];
        $report_telepon->total_kerugian = $data['total_kerugian'];

        $report_telepon->save();

        return $report_telepon->fresh();
    }

    public function getReportByUserID(){
        return ReportTelepon::where('user_id', Auth::user()->id)->get();
    }
}

?>