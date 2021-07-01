<?php

namespace App\Services;

use App\Repositories\ReportRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    // create
    public function saveRequest($data){
        $result = $this->reportRepository->save($data);
        return $result;
    }
    
    // read all
    public function readUserReports(){
        return $this->reportRepository->getReportByUserID();
    }
    
    // read all bank reports
    public function readUserBankReport(){
        return $this->reportRepository->getBankReportByUserID();
    }
    
    // read phone
    public function readUserPhoneReport(){
        return $this->reportRepository->getPhoneReportByUserID();
    }

    // read one bank report
    public function readReport($id){
        return $this->reportRepository->getReport($id);
    }
    
    // update
    public function editReport($id, $input){
        return $this->reportRepository->putReport($id, $input);
    }

    // delete
    public function deleteReport($id){
        return $this->reportRepository->destroyReport($id);
    }
}
