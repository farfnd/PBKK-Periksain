<?php

namespace App\Http\Controllers;

use App\Models\Disclaimer;
use Illuminate\Http\Request;

class DisclaimerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disclaimers = Disclaimer::all();
        return view('sanggahan.disclaimer_history', ['disclaimers' => $disclaimers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // return $request;
        Disclaimer::create([
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
