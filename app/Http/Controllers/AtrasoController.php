<?php

namespace App\Http\Controllers;

use App\Models\Atraso;
use Illuminate\Http\Request;

class AtrasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('atrasos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atraso  $atraso
     * @return \Illuminate\Http\Response
     */
    public function show(Atraso $atraso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atraso  $atraso
     * @return \Illuminate\Http\Response
     */
    public function edit(Atraso $atraso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atraso  $atraso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atraso $atraso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atraso  $atraso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atraso $atraso)
    {
        //
    }
}
