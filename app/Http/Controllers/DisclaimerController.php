<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\Disclaimer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDisclaimer;
use Illuminate\Support\Facades\Auth;

class DisclaimerController extends Controller
{
    public function isAuth(){
        if(!Auth::check()) return false;
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
            return redirect(route('login'));
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
            return redirect(route('login'));
        }
        if(Auth::user()->role != 'user'){
            return "Anda tidak berhak mengakses halaman ini";
        }
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
        if(!$this->isAuth()){
            return redirect(route('login'));
        }
        // return $request;

        $input = $request->all();

        Disclaimer::create($input);

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
