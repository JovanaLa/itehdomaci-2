<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Http\Resources\OcenaCollection;
use Illuminate\Http\Request;

class UserOcenaController extends Controller
{
    public function index($user_id)
    {
        $ocena = Ocena::get()->where('korisnik', $user_id);
        if (count($ocena) == 0)
            return response()->json('Nema podataka', 404);
        return new OcenaCollection($ocena);
    }

    public function myapprat()
    {
        if (auth()->user()->isAdmin())
            return response()->json('Nemate dozvolu za ocene.');
        $ocena = Ocena::get()->where('korisnik', auth()->user()->id);
        if (count($ocena) == 0)
            return response()->json('Nema podataka', 404);
        return new Ocena($ocena);

    }
}