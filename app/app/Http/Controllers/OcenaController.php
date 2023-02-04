<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use Illuminate\Http\Request;
use App\Models\Bioskop;
use App\Models\Film;
use App\Http\Resources\OcenaResource;
use App\Http\Resources\OcenaCollection;

class OcenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OcenaCollection(Ocena::all());
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
     * @param  \App\Models\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function show(Ocena $ocena)
    {
        return new OcenaResource($ocena);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocena $ocena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ocena $ocena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocena $ocena)
    {
        //
    }
}