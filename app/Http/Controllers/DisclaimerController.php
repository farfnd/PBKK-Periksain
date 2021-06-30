<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\Disclaimer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDisclaimer;
use App\Services\DisclaimerService;
use Illuminate\Support\Facades\Auth;

class DisclaimerController extends Controller
{
    protected $disclaimerService;

    public function __construct(DisclaimerService $disclaimerService)
    {
        $this->disclaimerService = $disclaimerService;
    }

    public function isAuth(){
        if(!Auth::check()) return false;
        else return true;
    }
    
    public function getDisclaimerByUser()
    {
        // return session('Bearer');
        return $this->disclaimerService->readUserDisclaimer();
    }
    
    
    public function getAuthorization(){
        return session('Authorization');
    }
    
    public function index()
    {
        // return session('Bearer');
        $disclaimers = $this->getDisclaimerByUser();
        return view('sanggahan.disclaimer_history', ['disclaimers' => $disclaimers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(!$this->isAuth()){
        //     return redirect(route('login'));
        // }
        return view('sanggahan.disclaimer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisclaimer $request)
    {
        // if(!$this->isAuth()){
        //     return redirect(route('login'));
        // }
        // return $request;

        $input = $request->except(['_token']);
        $result = ['status' => 200];
        
        // save using services
        try{
            // dd($input); die();
            $result['data'] = $this->disclaimerService->saveRequest($input);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $id = $result['data']['id'];
        $qrService = app()->make('SimpleQRService');
        $data = "Nama Penyanggah: ".Auth::user()->first_name." ".Auth::user()->last_name."; ID Sanggahan: ".$id."; ID Laporan: ".$input['id_laporan']."; Waktu Penyanggahan: ".$result['data']['created_at']." WIB";
        
        $qr = $qrService->generateQR($data);

        return view('sanggahan.disclaimer_post_read', ['disclaimer' => $result['data'], 'qr' => $qr]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disclaimer  $disclaimer
     * @return \Illuminate\Http\Response
     */
    public function show(Disclaimer $disclaimer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disclaimer  $disclaimer
     * @return \Illuminate\Http\Response
     */
    public function edit(Disclaimer $disclaimer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disclaimer  $disclaimer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disclaimer $disclaimer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disclaimer  $disclaimer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disclaimer $disclaimer)
    {
        //
    }
}
