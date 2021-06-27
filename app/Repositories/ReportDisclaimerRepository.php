<?php

namespace App\Repositories;

use App\Models\Disclaimer;
use Illuminate\Support\Facades\Auth;

class ReportDisclaimerRepository{
    protected $report_disclaimer;

    public function __construct(ReportDisclaimer $report_disclaimer)
    {
        $this->report_disclaimer = $report_disclaimer;
    }

    public function save($data){
        $report_disclaimer = new $this->report_disclaimer;

        $report_disclaimer->user_id = Auth::user()->id;
        $report_disclaimer->sanggahan = $data['sanggahan'];
        $report_disclaimer->file = $data['file'];
        

        $report_disclaimer->save();

        return $report_disclaimer->fresh();
    }

    public function getReportByUserID(){
        return ReportDisclaimer::where('user_id', Auth::user()->id)->get();
        // return "TEST";
    }
}

?>