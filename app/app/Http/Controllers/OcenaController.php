<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use Illuminate\Http\Request;
use App\Models\Bioskop;
use App\Models\Film;
use App\Http\Resources\OcenaResource;
use App\Http\Resources\OcenaCollection;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'datum_i_vreme' => 'required|date',
            'korisnik' => 'required|numeric|digits_between:1,5',
            'film' => 'required|numeric|digits_between:1,5',
            'ocena' => 'required|numeric|lte:5|gte:1',
            'poruka' => 'required|string|min:20',
            'bioskop' => 'required|numeric|digits_between:1,5',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $ocena = Ocena::create([
            'datum_i_vreme' => $request->datum_i_vreme,
            'korisnik' => $request->korisnik,
            'film' => $request->film,
            'ocena' => $request->ocena,
            'poruka' => $request->poruka,
            'bioskop' => $request->bioskop,
        ]);



        return response()->json(['Ocena je uspešno kreirana.', new OcenaResource($ocena)]);
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

        $validator = Validator::make($request->all(), [
            'datum_i_vreme' => 'required|date',
            'korisnik' => 'required|numeric|digits_between:1,5',
            'film' => 'required|numeric|digits_between:1,5',
            'ocena' => 'required|numeric|lte:5|gte:1',
            'poruka' => 'required|string|min:20',
            'bioskop' => 'required|numeric|digits_between:1,5',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $ocena->datum_i_vreme = $request->datum_i_vreme;
        $ocena->korisnik = $request->korisnik;
        $ocena->film = $request->film;
        $ocena->ocena = $request->ocena;
        $ocena->poruka = $request->poruka;
        $ocena->bioskop = $request->bioskop;

        return response()->json(['Ocena je uspešno kreirana.', new OcenaResource($ocena)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ocena  $ocena
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocena $ocena)
    {
        $ocena->delete();

        return response()->json('Ocena je uspešno obrisana.');
    }
}