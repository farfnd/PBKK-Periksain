<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disclaimer;
use App\Http\Request\StoreDiscliamer;
use Exception;
use App\Service\ReportDisclaimerService;
use Illuminate\Support\Facades\Auth;

class ReportDisclaimerController extends Controller
{
    protected $reportDisclaimerService;
 
    public function __construct(ReportRekeningService $reportDisclaimerService)
    {
        $this->reportDisclaimerService = $reportDisclaimerService;
    }

    public function index()
    {
        // return session('Bearer');
        $products = ReportDisclaimer::all();
        return $products;
    }

    public function getDisclaimerReportByUser()
    {
        // return session('Bearer');
        return $this->reportDisclaimerService->readUserDisclaimerReport();
    }


    public function getAuthorization(){
        return session('Authorization');
    }

    public function store(StoreDisclaimer $request)
    {
        if(!$this->isAuth()){
            return redirect(route('login'));
        }
        // return $request;

        $input = $request->all();

        Disclaimer::create($input);

        return view('sanggahan.disclaimer_post_success', ['disclaimer' => $request]);
    }

    public function display() {
        if(Auth::user()->role != 'user'){
            return "Anda tidak berhak mengakses halaman ini";
        }
        return view('sanggahan.disclaimer_create');

    }

   

} 
