<?php

namespace App\Http\Controllers;

use App\Models\DocentesPonente;
use Illuminate\Http\Request;

class DocentesPonenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('DocePone.index');
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
     * @param  \App\Models\DocentesPonente  $docentesPonente
     * @return \Illuminate\Http\Response
     */
    public function show(DocentesPonente $docentesPonente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocentesPonente  $docentesPonente
     * @return \Illuminate\Http\Response
     */
    public function edit(DocentesPonente $docentesPonente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocentesPonente  $docentesPonente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocentesPonente $docentesPonente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocentesPonente  $docentesPonente
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocentesPonente $docentesPonente)
    {
        //
    }
}
