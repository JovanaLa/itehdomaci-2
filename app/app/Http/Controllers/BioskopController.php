<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use Illuminate\Http\Request;
use App\Http\Resources\BioskopResource;
use App\Http\Resources\BioskopCollection;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:150',
            'kontakt' => 'required|string|max:150|unique:bioskop',
            'lokacija' => 'required|string|max:150',
            'email' => 'required|email|unique:bioskop',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $bioskop = Bioskop::create([
            'naziv' => $request->naziv,
            'kontakt' => $request->kontakt,
            'lokacija' => $request->lokacija,
            'email' => $request->email,
        ]);

        return response()->json(['Bioskop je uspešno kreiran.', new BioskopResource($bioskop)]);

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
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:150',
            'kontakt' => 'required|string|max:150|unique:bioskop,' . $bioskop->id,
            'lokacija' => 'required|string|max:150',
            'email' => 'required|email|unique:bioskop,email,' . $bioskop->id,
        ]);
        if ($validator->fails())
            return response()->json($validator->errors());


        $bioskop->naziv = $request->naziv;
        $bioskop->kontakt = $request->kontakt;
        $bioskop->lokacija = $request->lokacija;
        $bioskop->email = $request->email;

        $bioskop->save();

        return response()->json(['Bioskop je uspešno kreiran.', new BioskopResource($bioskop)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bioskop $bioskop)
    {
        $bioskop->delete();

        return response()->json('Bioskop je uspešno obrisan.');
    }
}