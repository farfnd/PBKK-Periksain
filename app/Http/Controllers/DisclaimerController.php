<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\Disclaimer;
use Illuminate\Http\Request;

class DisclaimerController extends Controller
{
    public function isAuth(){
        $account = json_decode(UserController::get_user());

        if($account->error_msg != 0) return false;
        else return true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }
        $disclaimers = Disclaimer::where('user_id', session('userid'))->get();
        return view('sanggahan.disclaimer_history', ['disclaimers' => $disclaimers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }
        return view('sanggahan.disclaimer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->isAuth()){
            return redirect(route('get_signin_form'));
        }
        // return $request;
        Disclaimer::create([
            'user_id' => session('userid'),
            'id_laporan' => $request->id_laporan,
            'sanggahan' => $request->sanggahan,
            'file' => $request->file,
            'created_at' => $request->created_at,
        ]);

        return view('sanggahan.disclaimer_post_success', ['disclaimer' => $request]);
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
