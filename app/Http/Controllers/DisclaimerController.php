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

        $qrService = app()->make('SimpleQRService');
        $qr = $qrService->generateQR_disclaimer($result['data']);

        return view('sanggahan.disclaimer_read', ['disclaimer' => $result['data'], 'qr' => $qr]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200];

        // read using services
        try{
            $result['data'] = $this->disclaimerService->readDisclaimer($id);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $qrService = app()->make('SimpleQRService');
        $qr = $qrService->generateQR_disclaimer($result['data']);
        return view('sanggahan.disclaimer_read', ['disclaimer' => $result['data'], 'qr' => $qr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disclaimer  $disclaimer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->disclaimerService->readDisclaimer($id);
        return view('sanggahan.disclaimer_edit', ['disclaimer' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreDisclaimer  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDisclaimer $request, $id)
    {
        $input = $request->except(['_token']);
        $result = ['status' => 200];
        
        // save using services
        try{
            // dd($input); die();
            if($this->disclaimerService->editDisclaimer($id, $input)){
                $result['data'] = $this->disclaimerService->readDisclaimer($id);
            }
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            die($result);
        }

        $qrService = app()->make('SimpleQRService');
        $qr = $qrService->generateQR_disclaimer($result['data']);

        return view('sanggahan.disclaimer_read', ['disclaimer' => $result['data'], 'qr' => $qr, 'profile_msg_read_info'=>'Sanggahan berhasil diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disclaimer  $disclaimer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($this->disclaimerService->deleteDisclaimer($request['id']));{
            if(Auth::user()->role == 'admin'){
                return redirect(route('admin.show_disclaimer'));
            }else{
                return view('sanggahan.disclaimer_history', ['profile_msg_read_info'=>'Sanggahan berhasil dihapus!']);
            }
        }
        if(Auth::user()->role == 'admin'){
            return redirect(route('admin.show_disclaimer'));
        }else{
            return view('sanggahan.disclaimer_history', ['profile_msg_error_info'=>'Sanggahan gagal dihapus!']);
        }
    }
}
