<?php

namespace App\Services;

use App\Repositories\ReportRekeningRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ReportRekeningService
{
    protected $reportRekeningRepository;

    public function __construct(ReportRekeningRepository $reportRekeningRepository)
    {
        $this->reportRekeningRepository = $reportRekeningRepository;
    }

    // create
    public function saveRequest($data){
        $result = $this->reportRekeningRepository->save($data);
        return $result;
    }
    
    // read
    public function readUserBankReport(){
        return $this->reportRekeningRepository->getReportByUserID();
    }

    // update

    // delete
}
