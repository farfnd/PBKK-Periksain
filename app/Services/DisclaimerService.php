<?php

namespace App\Services;

use App\Repositories\DisclaimerRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class DisclaimerService
{
    protected $disclaimerRepository;

    public function __construct(DisclaimerRepository $disclaimerRepository)
    {
        $this->disclaimerRepository = $disclaimerRepository;
    }

    // create
    public function saveRequest($data){
        $result = $this->disclaimerRepository->save($data);
        return $result;
    }
    
    // read
    public function readUserDisclaimer(){
        return $this->disclaimerRepository->getDisclaimerByUserID();
    }

    // update

    // delete
}
