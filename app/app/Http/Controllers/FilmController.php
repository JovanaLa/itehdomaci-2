<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Models\Bioskop;
use App\Models\Film;
use App\Http\Resources\FilmResource;
use App\Http\Resources\FilmCollection;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{

    public function index()
    {
        return new FilmCollection(Film::all());
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150|unique:film',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if (auth()->user()->isUser())
            return response()->json('Niste ovlašćeni da kreirate nove filmove.');

        $film = Film::create([
            'name' => $request->name,
        ]);

        return response()->json(['Film je uspešno kreiran.', new FilmResource($film)]);
    }

    public function show(Film $film)
    {
        return new FilmResource($film);
    }
    public function edit(Film $film)
    {
        //
    }


    public function update(Request $request, Film $film)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150|unique:film,name,' . $film->id,
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if (auth()->user()->isUser())
            return response()->json('Niste ovlašćeni da ažurirate filmove.');
        $film->name = $request->name;

        $film->save();
        return response()->json(['Film je uspešno kreiran.', new FilmResource($film)]);
    }


    public function destroy(Film $film)
    {
        if (auth()->user()->isUser())
            return response()->json('Niste ovlašćeni da brišete film.');
        $film->delete();
        return response()->json('Film je uspešno obrisan.');
    }
}