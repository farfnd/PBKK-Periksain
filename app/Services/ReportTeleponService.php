<?php

namespace App\Services;

use App\Repositories\ReportTeleponRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ReportTeleponService
{
    protected $reportTeleponRepository;

    public function __construct(ReportTeleponRepository $reportTeleponRepository)
    {
        $this->reportTeleponRepository = $reportTeleponRepository;
    }

    // create
    public function saveRequest($data){
        $result = $this->reportTeleponRepository->save($data);
        return $result;
    }
    
    // read
    public function readUserPhoneReport(){
        return $this->reportTeleponRepository->getReportByUserID();
    }

    // update

    // delete
}
