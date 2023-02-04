<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use Illuminate\Http\Request;
use App\Http\Resources\BioskopResource;
use App\Http\Resources\BioskopCollection;

class BioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bioskopi = Bioskop::all();
        return new BioskopCollection($bioskopi);
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
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function show(Bioskop $bioskop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function edit(Bioskop $bioskop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bioskop $bioskop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bioskop $bioskop)
    {
        //
    }
}