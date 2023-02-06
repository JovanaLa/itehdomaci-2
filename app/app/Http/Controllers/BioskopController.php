<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Models\Film;
use App\Models\Bioskop;
use Illuminate\Http\Request;
use App\Http\Resources\BioskopResource;
use App\Http\Resources\BioskopCollection;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class BioskopController extends Controller
{

    public function index()
    {
        $bioskopi = Bioskop::all();
        return new BioskopCollection($bioskopi);
    }


    public function create()
    {
        //
    }


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

        if (auth()->user()->isUser())
            return response()->json('Niste ovlašćeni da kreirate nove bioskope.');

        $bioskop = Bioskop::create([
            'naziv' => $request->naziv,
            'kontakt' => $request->kontakt,
            'lokacija' => $request->lokacija,
            'email' => $request->email,
        ]);

        return response()->json(['Bioskop je uspešno kreiran.', new BioskopResource($bioskop)]);

    }


    public function show(Bioskop $bioskop)
    {
        //
    }


    public function edit(Bioskop $bioskop)
    {
        //
    }

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

        if (auth()->user()->isUser())
            return response()->json('Niste ovlašćeni da ažurirate bioskop.');

        $bioskop->naziv = $request->naziv;
        $bioskop->kontakt = $request->kontakt;
        $bioskop->lokacija = $request->lokacija;
        $bioskop->email = $request->email;

        $bioskop->save();

        return response()->json(['Bioskop je uspešno ažuriran.', new BioskopResource($bioskop)]);

    }


    public function destroy(Bioskop $bioskop)
    {
        if (auth()->user()->isUser())
            return response()->json('Niste ovlašćeni da obrišete bioskop');
        $bioskop->delete();

        return response()->json('Bioskop je uspešno obrisan.');
    }
}