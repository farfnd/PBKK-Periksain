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
    
    // read all by user
    public function readUserDisclaimer(){
        return $this->disclaimerRepository->getDisclaimerByUserID();
    }

    // read one disclaimer
    public function readDisclaimer($id){
        return $this->disclaimerRepository->getDisclaimer($id);
    }

    // update
    public function editDisclaimer($id, $input){
        return $this->disclaimerRepository->putDisclaimer($id, $input);
    }

    // delete
    public function deleteDisclaimer($id){
        return $this->disclaimerRepository->destroyDisclaimer($id);
    }
}
