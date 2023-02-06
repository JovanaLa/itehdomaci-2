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

    public function index()
    {

        return new OcenaCollection(Ocena::all());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'datum_i_vreme' => 'required|date',
            'film' => 'required|numeric|digits_between:1,5',
            'ocena' => 'required|numeric|lte:5|gte:1',
            'poruka' => 'required|string|min:20',
            'bioskop' => 'required|numeric|digits_between:1,5',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());
        if (auth()->user()->isAdmin())
            return response()->json('Niste ovlašćeni da kreirate nove ocene.');

        $ocena = Ocena::create([
            'datum_i_vreme' => $request->datum_i_vreme,
            'korisnik' => auth()->user()->id,
            'film' => $request->film,
            'ocena' => $request->ocena,
            'poruka' => $request->poruka,
            'bioskop' => $request->bioskop,
        ]);



        return response()->json(['Ocena je uspešno kreirana.', new OcenaResource($ocena)]);
    }



    public function show(Ocena $ocena)
    {
        return new OcenaResource($ocena);
    }


    public function edit(Ocena $ocena)
    {
        //
    }


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

        if (auth()->user()->isAdmin())
            return response()->json('Niste ovlašćeni da ažurirate ocene.');

        if (auth()->user()->id != $ocena->korisnik)
            return response()->json('Niste ovlašćeni da ažurirate tuđe ocene');

        $ocena->datum_i_vreme = $request->datum_i_vreme;
        $ocena->korisnik = auth()->user()->id;
        $ocena->film = $request->film;
        $ocena->ocena = $request->ocena;
        $ocena->poruka = $request->poruka;
        $ocena->bioskop = $request->bioskop;

        $ocena->save();

        return response()->json(['Ocena je uspešno kreirana.', new OcenaResource($ocena)]);
    }


    public function destroy(Ocena $ocena)
    {
        if (auth()->user()->isAdmin())
            return response()->json('Niste ovlašćeni da obrišete ocenu.');

        if (auth()->user()->id != $ocena->korisnik)
            return response()->json('Niste ovlašćeni da obrišete tuđu ocenu.');

        $ocena->delete();

        return response()->json('Ocena je uspešno obrisana.');
    }
}