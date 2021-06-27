<?php

namespace App\Services;

use App\Repositories\ReportDisclaimerRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ReportDisclaimerService
{
    protected $reportDisclaimerRepository;

    public function __construct(ReportDisclaimerRepository $reportDisclaimerRepository)
    {
        $this->reportDisclaimerRepository = $reportDisclaimerRepository;
    }

    // create
    public function saveRequest($data){
        $result = $this->reportDisclaimerRepository->save($data);
        return $result;
    }
    
    // read
    public function readUserDisclaimerReport(){
        return $this->reportDisclaimerRepository->getReportByUserID();
    }

    // update

    // delete
}
